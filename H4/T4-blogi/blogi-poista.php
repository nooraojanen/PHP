<link rel="stylesheet" type="text/css" href="tyyli.css">
<title>Blogimerkinnän poistaminen</title>
<meta charset="UTF-8">

<div id='container'>

<?php include("config-navbar.php")?>

<h2>Blogimerkinnän poistaminen</h2>

<?php
if(!isset($_GET['id'])) exit();

$filename = $_GET['id'];
unlink($filename);	

echo "<p>Poistit blogimerkinnän:</p>$filename";
?>

