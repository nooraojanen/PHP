<title>T5</title>
<meta charset="UTF-8">

<?php

if(isset($_GET['nappi'])) {
    $summa = 0;

    $summa = $summa + $_GET['kysymys1'];

    if(isset($_GET['kysymys2'])) {
    foreach ($_GET['kysymys2'] as $pojot) {
        $summa += $pojot;
    }
    echo "<p>Onneksi olkoon, sait $summa pistettä!</p>";
    }
}


$lomake = <<<EOLomake
<form method="get" action="T5.php">
<p>Kysymys 1:</p>
<input type='radio' name='kysymys1' value='1'>Hauki on kala<br>\n
<input type='radio' name='kysymys1' value='0'>Hauki on lintu<br>\n
<input type='radio' name='kysymys1' value='0'>Hauki on kissa<br>\n<br>

<p>Kysymys 2:</p>
<input type='checkbox' name='kysymys2[]' value='3'>Mega on miljoona<br>\n
<input type='checkbox' name='kysymys2[]' value='-3'>Giga on miljoona<br>\n
<input type='checkbox' name='kysymys2[]' value='-3'>Haluan mijonääriksi<br>\n<br>

<input type="submit" name="nappi" value="Valmis">
</form>
EOLomake;

echo $lomake;
?>