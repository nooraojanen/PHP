<title>T3</title>
<meta charset="UTF-8">
<form method="get"
      action="T3.php">
Anna tähtien lukumäärä:<br><input type="text" name="star"><br>
<input type="submit" name="nappi" value="Lähetä">
</form>

<?php
if(!isset($_GET['nappi'])) exit();

$stars = $_GET['star'];

for ($i = 0; $i < $stars; $i++)
{
   echo "*";
}
?>