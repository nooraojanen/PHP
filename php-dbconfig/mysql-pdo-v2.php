<?php
// mysql-pdo-v2.php
try {
    $db = new PDO('mysql:host=localhost;dbname=osoitteet;charset=utf8',
                  'M0313', 'sala');
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $stmt = $db->query('SELECT * FROM henkilot');
} catch(PDOException $ex) {
    echo "ErrMsg to enduser!<hr>\n";
    echo "CatchErrMsg: " . $ex->getMessage() . "<hr>\n";
    //logError($ex->getMessage());
}

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "{$row['sukunimi']}, {$row['etunimi']}<br>\n";
}
?>