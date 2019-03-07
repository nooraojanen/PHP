<title>T2</title>
<meta charset="UTF-8">

<?php
$taustavarit['Keltainen'] = '#ff0';
$taustavarit['Punainen'] = '#f00';
$taustavarit['Sininen'] = '#00f';

$tekstivarit['Musta'] = '#000';
$tekstivarit['Punainen'] = '#f00';
$tekstivarit['Valkoinen'] = '#fff';


$taustavari = '#fed';

$tekstivari = '#000';

if(isset($_GET['tvari'])) {
    $taustavari = $_GET['tvari'];
}

if(isset($_GET['tkvari'])) {
    $tekstivari = $_GET['tkvari'];
}

$tyylit = <<<EOTyyli
<style type="text/css">
body {
    background-color: $taustavari;
    color: $tekstivari;
}
</style>
EOTyyli;


$optiot = '';

$optiot2 = '';

foreach($taustavarit as $varinimi => $varikoodi) {
    $valittu = '';
    if($taustavari == $varikoodi) $valittu = 'checked';
    $optiot .= "<input type='radio' name='tvari' value='$varikoodi' $valittu>$varinimi<br>\n";

}

foreach($tekstivarit as $varinimi => $varikoodi) {
    $valittu = '';
    if($tekstivari == $varikoodi) $valittu = 'checked';
    $optiot2 .= "<input type='radio' name='tkvari' value='$varikoodi' $valittu>$varinimi<br>\n";

}


$lomake = <<<EOLomake
<form method="get" action="T2.php">
<p>Taustaväri:</p>
$optiot

<p>Tekstiväri:</p>
$optiot2<br>

<input type="submit" name="nappi" value="Väritä">
</form>
EOLomake;

echo $tyylit;
echo $lomake;
?>