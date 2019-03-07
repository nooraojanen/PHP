<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Exception;
use Session;
use Alert;
use Illuminate\Support\Facades\Redirect;

class CsvController extends Controller
{

    // Tiedoston latauslomake
    public function create() {
        return view('upload');
    }


// CSV-tiedoston lataaminen palvelimelle, lukeminen/muototarkistus ja tallentaminen tietokantaan
 public function store(Request $request) {
        // Aiemmista yrityksistä sessiomutttujiin kertyneet virheet nollataan
        if ($request->session()->has('virheet')) {
            $request->session()->forget('virheet');
	        $request->session()->forget('rivi');
	        $request->session()->forget('rivinro');
        }

        // Jos lomakkeelta tuli CSV-tiedosto, tallennetaan se nimelle
        // storage/app/harkat-2018-10-21--06-59-48.csv
        if($request->hasFile('csvfile')){
            $filenameWithExt = $request->file('csvfile')->getClientOriginalName();
            //get filename, esim. harkat
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get ext esim. csv
            $extension = $request->file('csvfile')->getClientOriginalExtension();
            //Filename to storage
            $fileNameToStore = $filename.'-'.date("Y-m-d--H-i-s").'.'.$extension;
            //Upload file
            $path = $request->file('csvfile')->storeAs('public', $fileNameToStore);
        }

        $filename = base_path("/storage/app/$path");
	    $file = fopen($filename, "r");

        $jokuvirhe = FALSE;
        $rivinro = 0;
        $rivi = '';

        // Luetaan CSV-tiedostoa riveittäin
	    while ( ($data = fgetcsv($file, 2000, ";")) !==FALSE) {

  	     $rivinro++;

	     $nro            = $data[0];
         $palautuspvm    = $data[1];
         $kuvaus         = $data[2];


       // Tarkistetaan kenttien muoto semipätevästi ja otetaan
       // virheet talteen sessiomuuttujaan 'virheet'
	   if (!preg_match('/^([0-9]{1,3})$/i', $nro))
	   {
		Session::push('virheet', "nro:<b>" . $nro . "</b> (Sallitaan: VAIN 1-3 numeroa peräkkäin)");
                $jokuvirhe = TRUE;
	   }

	   if (!preg_match('/^((2018|2019|2020)-[0-9]{2}-[0-9]{2})$/i', $palautuspvm))
	   {
		Session::push('virheet', "palautuspvm:<b>" . $palautuspvm . "</b> (Sallitaan: kirjain JA 4 numeroa peräkkäin)");
                $jokuvirhe = TRUE;
	   }


	   if (!preg_match('/^(.{3,64})$/i', $kuvaus))
	   {
		Session::push('virheet', "kuvaus:<b>" . $kuvaus . "</b> (Sallitaan: [A-Za-z0-9 ] 3-64kpl)");
                $jokuvirhe = TRUE;
	   }


    // Jos rivillä oli joku virhe, otetaan rivin tiedot talteen sessiomuuttujaan ja
    // palataan tallennuslomakkeeseen näyttäen ensimmäisen virheellisen rivin
    // tiedot. Näin ollen tietoja ei edes yritetä tallentaa tieokantaan ennen kuin
    // muototarkistus on mennyt läpi
	if($jokuvirhe) {
                foreach($data as $f) {
			$rivi .= $f . ";";
		}
		$rivi = rtrim($rivi,";");
		fclose($file);
		Session::put('rivinro', $rivinro);
		Session::put('rivi', $rivi);
		return Redirect::to('/upload');
	}

	  }
	  fclose($file);

    // CSV-tiedoston muototarkistus on mennyt läpi, yritetään tallentaa tietokantaan
    $PDO = DB::connection('mysql')->getPdo();
    
    // Jos yhdenkn rivin lisäyksessä tulee ongelmia, voidaan kaikkien rivien lisäykset
    // peruuttaa
    DB::beginTransaction();
    
    // Luetaan ladattu tiedosto
	$filename = base_path("/storage/app/$path");
	$file = fopen($filename, "r");

        $jokuvirhe = FALSE;
        $rivinro = 0;
        $rivi = '';
	 while ( ($data = fgetcsv($file, 2000, ";")) !==FALSE) {
  	     $rivinro++;

           $nro            = $data[0];
           $palautuspvm    = $data[1];
           $kuvaus         = $data[2];

        // Yritetään tallentaa rivin tietoja
		try
		{

			$sql = "INSERT INTO hsarja (nro, palautuspvm, kuvaus) VALUES(:f1,:f2,:f3)";
			$insertsql = $PDO->prepare($sql);
			$insertsql->execute(array(':f1' => $nro, ':f2' => $palautuspvm, ':f3' => $kuvaus));
        }
        
        // Jos ongelmia, peruutetaan
		catch(\Exception $e)
		{
		    DB::rollback();

            if ($e instanceof \PDOException) {

                $dbCode = trim($e->getCode());
                //Codes specific to mysql errors
                switch ($dbCode)
                {
                    // 23000 = Integrity constraint violation eli esim sama PK kuin jo olemassa olevalla tietueella
                    case 23000:
                        $errorMessage = 'Tietokantaongelma: Yritit ehkä tallentaa samoja harjoituksia toiseen kertaan?';
                        break;
                    default:
                        $errorMessage = 'Tietokantaan tallentamisessa ongelmia';

                }

               // Ei lisätty yhtään tietuetta (koska rollback), palataan lisäyslomakkeeseen,
               // jossa näytetään virheviesti
               return redirect()->back()->with('info_msg',"$errorMessage");

            }
		}
    }
    
    // Hyväksytään kaikki rivit tietokantaan, palataan lomakesivulle ja näytetään viesti onnistumisesta
	DB::commit();
    fclose($file);
    return redirect('/upload')->with('info_msg', 'CSV-tiedoston KAIKKI rivit lisätty onnistuneesti');
}
} // CscController-luokka päättyy tähän
