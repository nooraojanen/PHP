<?php
// mysql-pdo-v3.php
require_once("/home/M0313/php-dbconfig/db-init.php");
$stmt = $db->query('SELECT * FROM henkilot');
echo "<table border='1'>\n";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo "<tr><td>{$row['sukunimi']}</td><td>{$row['etunimi']}</td></tr>\n";
}
echo "</table>\n";
?>