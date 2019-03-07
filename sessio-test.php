
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
</head>
<body>

<?php
session_start();
 
if (isset($_SESSION['laskuri'])) {
   $_SESSION['laskuri']++;
} else {
   $_SESSION['laskuri'] = 1;
}
 
echo("Olet vieraillut täällä <b>{$_SESSION['laskuri']}</b>kertaa!");
?>

</body>
</html>