<link rel="stylesheet" type="text/css" href="tyyli.css">
<title>Tallenna blogimerkintä</title>
<meta charset="UTF-8">

<div id='container'>

<?php include("config-navbar.php")?>

<h2>Tallensit blogimerkinnän</h2>

<?php
// Lisätään viesti

$aikaleima = date("Y-m-d--H-i-s");
define("BLOGI_FILE", "$datadir/$aikaleima.txt");

if(isset($_GET['nappi'])) {
  if (!$fp = @fopen(BLOGI_FILE, "w"))
     {echo "fopen virhe!"; exit();}

  // Valmistellaan merkintä
  $_GET['merkinta'] = nl2br($_GET['merkinta']);

  $blogimerkinta = <<<BLOGIMERKINTA
  <div class='merkinta'>
  <h4>{$_GET['otsikko']}</h4>
  <p>{$_GET['merkinta']}</p>
  </div>
BLOGIMERKINTA;

  //Kirjoitetaan merkintä tiedostoon
  fwrite($fp, $blogimerkinta);
  fclose($fp);
}

echo $blogimerkinta;

?>
