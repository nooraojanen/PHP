<?php

function __autoload($class_name){
    require_once $class_name . '.class.php';
}


// Datan alustus

$title = "Esimerkki T1";
$bodynsisalto = "<h1>Esimerkki T1</h1><p>Lorem Ipsum</p>";
$avainsanat= "kotska, sivu";

$munkotisivu = new Websivu($title, $avainsanat);
$munkotisivu->asetaBodyelementinSisalto($bodynsisalto);

$munkotisivu->naytaSivu();

?>