<title>Horoskooppi</title>
<meta charset="UTF-8">

<?php
include("navbar.php");

$valikko['ei-valittu.txt'][0] = '';
$valikko['kalat.txt'][0] = '';
$valikko['oinas.txt'][0] = '';

$valikko['ei-valittu.txt'][1] = 'Valitse horoskooppi';
$valikko['kalat.txt'][1] = 'Kalat';
$valikko['oinas.txt'][1] = 'Oinas';

$tahtimerkki = isset($_GET['tahtimerkki']) ? $_GET['tahtimerkki'] : "ei-valittu.txt";
$valikko[$tahtimerkki][0] = ' selected';


?>

<form method="get" action="horoskooppi.php">
<input type="submit" name="nappi" value="Näytä ennustus">
<br>
<select name="tahtimerkki">
<?php

foreach ($valikko as $avain => $arvo) {
    echo "<option value='$avain'$arvo[0]>$arvo[1]</option>";
}

?>

</select>

</form>

<?php
include("$tahtimerkki");
?>

