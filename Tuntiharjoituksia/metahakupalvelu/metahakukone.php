<?php
if (!isset($_GET['nappi'])) {
    $hakusana = urlencode($_GET['hakusana']);
    header("Location: {$_GET['hakukone']}$hakusana");
}
?>

<form method="get" action="metahakukone.php">
<input type="text" name="hakusana">
<input type="submit" name="nappi" value="Etsi">
<br>
<select name="hakukone">
    <option value="http://www.google.com/search?q=">Google</option>
    <option value="http://www.bing.com/search?q=">Bing</option>
</select>
</form>