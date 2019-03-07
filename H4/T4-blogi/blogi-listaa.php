<link rel="stylesheet" type="text/css" href="tyyli.css">
<title>Blogi</title>
<meta charset="UTF-8">

<div id='container'>

<?php include("config-navbar.php")?>

<h2>Blogi</h2>



<?php

foreach (glob("$datadir/*.txt") as $filename) {
    $filet[] = $filename;
}

if (is_array($filet)){
    rsort($filet);

    foreach ($filet as $filename) {
        include($filename);
        echo "<a href='blogi-merkinta.php?id=$filename'> $filename</a>";
        echo "<hr>";
    }
}

?>


