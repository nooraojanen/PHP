<link rel="stylesheet" type="text/css" href="tyyli.css">
<title>Blogimerkintä</title>
<meta charset="UTF-8">

<div id='container'>

<?php include("config-navbar.php")?>

<h2>Blogimerkintä</h2>

<?php
if(!isset($_GET['id'])) exit();

$filename = $_GET['id'];
include($filename);	

echo "<a href='blogi-poista.php?id=$filename'>Poista</a>";
echo "<hr>";
?>

