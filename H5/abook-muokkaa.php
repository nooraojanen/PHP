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
// abook-muokkaa.php

@include("navbar.php");
require_once('/home/M0313/php-dbconfig/db-init.php');

$tunnus   = isset($_REQUEST['tunnus'])   ? $_REQUEST['tunnus'] : '';
$sukunimi = isset($_REQUEST['sukunimi']) ? $_REQUEST['sukunimi'] : '';
$etunimi  = isset($_REQUEST['etunimi'])  ? $_REQUEST['etunimi'] : '';
$puhnro   = isset($_REQUEST['puhnro'])   ? $_REQUEST['puhnro'] : '';
$email    = isset($_REQUEST['email'])    ? $_REQUEST['email'] : '';
$osoite   = isset($_REQUEST['osoite'])   ? $_REQUEST['osoite'] : '';
    
$sql = <<<SQLEND
UPDATE henkilot
SET
sukunimi = :sukunimi,
etunimi = :etunimi,
puhnro = :puhnro,
email = :email,
osoite = :osoite
WHERE tunnus = :tunnus
SQLEND;


   $stmt = $db->prepare("$sql");
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->bindValue(':sukunimi', "$sukunimi", PDO::PARAM_STR);
   $stmt->bindValue(':etunimi', "$etunimi", PDO::PARAM_STR);
   $stmt->bindValue(':puhnro', "$puhnro", PDO::PARAM_STR);
   $stmt->bindValue(':email', "$email", PDO::PARAM_STR);
   $stmt->bindValue(':osoite', "$osoite", PDO::PARAM_STR);
      
   $stmt->execute();    
  
  $affected_rows = $stmt->rowCount();
  
  echo "$affected_rows päivitettiin onnistuneesti!";
  
?>