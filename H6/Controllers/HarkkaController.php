<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

//use App\Harkka;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HarkkaController extends Controller
{

    /*
    public function list_all2()
    {
        $harkat = Harkka::all();
        return view('harkat')->with('harkat', $harkat);
    }
    */


    public function list_all()
    {
	$PDO = DB::connection('mysql')->getPdo();

	$sql = <<< SQLEND
	SELECT *
	FROM hsarja
SQLEND;

	$allsql = $PDO->prepare($sql);

	$allsql->execute();

        // Muista TÄMÄ FETCH_OBJ
	$harkat = $allsql->fetchAll((\PDO::FETCH_OBJ));

        return view('harkat')->with('harkat', $harkat);
        
}

}