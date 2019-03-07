<title>T1</title>
<meta charset="UTF-8">

<?php
$on_vasy = '';
$on_paapipi = '';
$on_pe = '';

if(isset($_GET['vasy'])) {
    echo "<h1>Väsyttää ankarasti.</h1>";
    $on_vasy = "checked";
}

if(isset($_GET['paapipi'])) {
    echo "<h1>Sattuu päähän.</h1>";
    $on_paapipi = "checked";
}

if(isset($_GET['pe'])) {
    echo "<h1>On perjantai.</h1>";
    $on_pe = "checked";
}

$lomake = <<<EOLomake
<form method="get" action="T1.php"><br><br>
<h2>Mikä on?</h2>
<input type="checkbox" name="vasy" $on_vasy>Väsy<br>
<input type="checkbox" name="paapipi" $on_paapipi>Pää kipiä<br>
<input type="checkbox" name="pe" $on_pe>Perjantai<br><br>
<input type="submit" name="nappi" value="Tunne jotain"><br>
</form>
EOLomake;

echo $lomake;
?>