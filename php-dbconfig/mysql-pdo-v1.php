<title>Esim.</title>
<meta charset="UTF-8">

<?php
// mysql-pdo-v1.php
$db = new PDO('mysql:host=mysql.labranet.jamk.fi;dbname=M0313_2;charset=utf8',
              'M0313', 'jrBCLbkzSerfR04vQHiZ8iAnY5Q3fFU1');

$stmt = $db->query('SELECT * FROM henkilot');
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['sukunimi']}, {$row['etunimi']}<br>\n";
}
?>