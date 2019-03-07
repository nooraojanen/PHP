<title>Horoskooppi</title>
<meta charset="UTF-8">

<?php
$fp = fopen("{$_GET['tahtimerkki']}", "w");
fwrite($fp, $_GET['ennustus']);
fclose($fp);
echo "Onnistui";

//header("Location: horoskooppi-form.php");
?>


