<title>Autolaskuri</title>
<meta charset="UTF-8">

<?php
    require_once 'Autolaskuri.class.php';
    session_start();

    echo "<h1 style=background-color:#D7FFCB;color:#000>Autolaskuri</h1>";
    echo '<form method="post">'.
			'<input type="submit" name="button1" value="VW"/>'.
			'<input type="submit" name="button2" value="Opel"/>'.
			'<input type="submit" name="button3" value="Toyota"/>'.
			'<input type="submit" name="button4" value="Nollaa"/>'.
         '</form>';
         
    $vw = isset($_SESSION['vw']) ? unserialize($_SESSION['vw']) : new Autolaskuri("Volkswagen");
    $opel = isset($_SESSION['opel']) ? unserialize($_SESSION['opel']) : new Autolaskuri("Opel");
    $toyota = isset($_SESSION['toyota']) ? unserialize($_SESSION['toyota']) : new Autolaskuri("Toyota");

    //volkswagen
    if(isset($_POST['button1'])){
    	$vw->increase();
    	$_SESSION['vw'] = serialize($vw);
    }

    //opel
    if(isset($_POST['button2'])){
    	$opel->increase();
    	$_SESSION['opel'] = serialize($opel);
    } 

    //toyota
    if(isset($_POST['button3'])){
    	$toyota->increase();
    	$_SESSION['toyota'] = serialize($toyota);
    } 

    // nollaus
    if(isset($_POST['button4'])){
    	unset($_SESSION['vw']);
    	unset($_SESSION['opel']);
    	unset($_SESSION['toyota']);
    	$vw->reset();
    	$opel->reset();
    	$toyota->reset();
    } 

    nayta_tulokset($vw, $opel, $toyota);

    function nayta_tulokset($vw, $opel, $toyota) {
        echo "<pre>\n";
        echo "Volkswagenit ... : $vw kpl.\n";
        echo "Opelit ......... : $opel kpl.\n";
        echo "Toyotat ........ : $toyota kpl.\n";
        echo "</pre>\n";
     }
     
?>