<title>T2</title>
<meta charset="UTF-8">
<form method="get"
      action="T2.php">
Muuta eurot markoiksi:<br><input type="text" name="euro" value="<?php echo $_GET['euro']?>"> €<br><br>
<input type="submit" name="nappi" value="Laske">
</form>

<?php
if(!isset($_GET['nappi'])) exit();

$markat = $_GET['euro'] * 5.94573;

echo "<strong>$markat</strong> markkaa<p>";
?>