<title>T1</title>
<meta charset="UTF-8">
<form method="post"
      action="T1.php">
Mikä on painosi kiloina:<br><input type="text" name="paino"><br>
<input type="submit" name="nappi" value="Lähetä">
</form>

<?php
if(!isset($_POST['nappi'])) exit();

$uusipaino = $_POST['paino'] - 5;

echo "Minun painoni on <strong>$uusipaino</strong>, sinulla taitaa olla paino-ongelmia?<p>";
?>