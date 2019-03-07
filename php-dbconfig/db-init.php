<?php
// db-init.php
$db = new PDO('mysql:host=mysql.labranet.jamk.fi;dbname=M0313_2;charset=utf8',
              'M0313', 'jrBCLbkzSerfR04vQHiZ8iAnY5Q3fFU1');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>