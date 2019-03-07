<title>PHP-esimerkki: tulosta-tiedot2.php</title>
<meta charset="UTF-8">
<form method="get"
      action="tulosta-tiedot2.php">
Nimi:<br><input type="text" name="kokonimi"><br>
Osoite:<br><input type="text" name="osoite"><br>
Svuosi:<br><input type="text" name="svuosi"><br>
<input type="submit" name="nappi" value="Lähetä">
</form>

<?php
if(!isset($_GET['nappi'])) exit();

echo "Terve <strong>{$_GET['kokonimi']}</strong><br>";
echo "Osoitteesi on <strong>{$_GET['osoite']}</strong><p>";

$ika = 2019 - $_GET['svuosi'];

echo "Ikäsi on <strong>$ika</strong><p>";
?>