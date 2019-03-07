<title>Tarkistuskoodi</title>
<meta charset="UTF-8">

<?php
if (isset($_GET['nappi'])) {

    $koodi = $_GET['koodi'];

    if (preg_match("/^(([0-9]{5})(-[0-9]{4})?)$/", $koodi)) {
        echo "Koodi OK"; 
    } else {
        echo "Koodi EK";
    }
}

?>

<form method="get" action="tarkistuskoodi.php">
<input type="text" name="koodi" value="<?php echo $koodi?>">
<input type="submit" name="nappi" value="Tarkista">
<br>

</form>