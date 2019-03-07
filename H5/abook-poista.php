<title>H5</title>
<meta charset="UTF-8">

<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
h1 {background-color:#ffeedd}
</style>
<h1>Osoitekirja</h1>
<hr>
<?php
// abook-poista.php

@include("navbar.php");
require_once('/home/M0313/php-dbconfig/db-init.php');

// Otetaan data talteen:
$tunnus = (isset($_REQUEST['tunnus'])) ? $_REQUEST['tunnus'] : '';
$sukunimi = (isset($_REQUEST['sukunimi'])) ? $_REQUEST['sukunimi'] : '';
     
$stmt = poistaHenkilo($db, $tunnus);
$affected_rows = $stmt->rowCount();
 
function poistaHenkilo($db, $tunnus) {
   $sql = <<<SQLEND
   DELETE
   FROM henkilot WHERE tunnus = :tunnus
SQLEND;
 
   $stmt = $db->prepare("$sql");
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}

echo "$affected_rows poistettiin onnistuneesti!";
?>