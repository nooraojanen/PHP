<title>T4</title>
<meta charset="UTF-8">

<?php      
        
        $viestit = array("", "Yksi kerta riittää", "Kaksi kertaa riittää", "Kolme kertaa riittää");
    
        session_start();
        if (isset($_GET['nappi'])){
        	$_SESSION['laskuri']++;
    	}
        $laskuri = ($_SESSION['laskuri']) % 4; 
        
?>
<form method="get">
    <input type="submit" name="nappi" value="Paina minua">
    <input type="text" name="msg" value="<?php echo ($viestit[$laskuri]); ?>">
</form>
