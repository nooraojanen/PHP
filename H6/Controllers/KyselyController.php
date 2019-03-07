<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KyselyController extends Controller
{

    public function list_personal_scores(Request $request)
    {

       $student_id = Auth::id();

	$PDO = DB::connection('mysql')->getPdo();

	$sql = <<< SQLEND
	SELECT users.id, users.name, users.email,
	       tpalautus.hnro, tpalautus.tnro,tpalautus.palautusaika,  tpalautus.initpoints, tpalautus.finalpoints, tpalautus.kommentti, tpalautus.url,
	       tspec.maxpist,
	       hsarja.palautuspvm, hsarja.kuvaus
	FROM users
	INNER JOIN tpalautus
	  ON users.id = tpalautus.student_id
	INNER JOIN tspec
	  ON tspec.hnro = tpalautus.hnro AND tspec.tnro = tpalautus.tnro
	INNER JOIN hsarja
	  ON hsarja.nro = tspec.hnro
        WHERE users.id = :student_id
        ORDER BY users.id, tpalautus.hnro, tpalautus.tnro
SQLEND;


	$allscoresql = $PDO->prepare($sql);
        $allscoresql->bindParam(':student_id', $student_id, \PDO::PARAM_INT);

	$allscoresql->execute();
	$allscorelist = $allscoresql->fetchAll((\PDO::FETCH_OBJ)); // Muista TÄMÄ FETCH_OBJ


	$sql = <<< SQLEND
	SELECT sum(tpalautus.initpoints) as ipoints, sum(tpalautus.finalpoints) as fpoints,
               sum(tspec.maxpist) as mpoints
        FROM tspec
	INNER JOIN tpalautus
	  ON tspec.hnro = tpalautus.hnro AND tspec.tnro = tpalautus.tnro
        WHERE tpalautus.student_id = :student_id AND
              tpalautus.finalpoints IS NOT NULL;
SQLEND;

	$sqlresult = $PDO->prepare($sql);
        $sqlresult->bindParam(':student_id', $student_id, \PDO::PARAM_INT);


	$sqlresult->execute();
	$sumscorelist = $sqlresult->fetchAll((\PDO::FETCH_OBJ)); // Muista TÄMÄ FETCH_OBJ

	$sql = <<< SQLEND
	SELECT sum(maxpist) as maxpoints
        FROM tspec
SQLEND;
	$sqlresult = $PDO->prepare($sql);
	$sqlresult->execute();
	$totalsumscorelist = $sqlresult->fetchAll((\PDO::FETCH_OBJ)); // Muista TÄMÄ FETCH_OBJ


	$sql = <<< SQLEND
	SELECT sum(tpalautus.initpoints) as ipoints, sum(tpalautus.finalpoints) as fpoints,
               sum(tspec.maxpist) as mpoints
        FROM tspec
	INNER JOIN tpalautus
	  ON tspec.hnro = tpalautus.hnro AND tspec.tnro = tpalautus.tnro
        WHERE tpalautus.student_id = :student_id AND
              tpalautus.finalpoints IS NULL;
SQLEND;
	$sqlresult = $PDO->prepare($sql);
        $sqlresult->bindParam(':student_id', $student_id, \PDO::PARAM_INT);
	$sqlresult->execute();
	$pendingsumscorelist = $sqlresult->fetchAll((\PDO::FETCH_OBJ)); // Muista TÄMÄ FETCH_OBJ




        return view('allscorelist')->with('allscorelist', $allscorelist)->with('sumscorelist', $sumscorelist)->with('totalsumscorelist', $totalsumscorelist)->with('pendingsumscorelist', $pendingsumscorelist);

        // return $allscorelist;
        
}
} // class


