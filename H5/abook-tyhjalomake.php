<title>H5</title>
<meta charset="UTF-8">

<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
h1 {background-color:#ffeedd}
</style>
<h1>Osoitekirja</h1>
<hr>
<?php
// abook-tyhjalomake.php

@include("navbar.php");
require_once('/home/M0313/php-dbconfig/db-init.php');

teeUusiLomake();

function teeUusiLomake() {

    $forms = <<<FORMEND
    <em>Lisää osoite</em><form method='post' action='abook-lisaa.php'>
    <table border='0' cellpadding='5'>
    <tr valign='top'>
      <td align='right' bgcolor='#ffeedd'>Tunnus</td>
      <td bgcolor='#dddddd'><input type='text' name='tunnus' size='30'></td>
    </tr>
    <tr valign='top'>
      <td align='right' bgcolor='#ffeedd'>Sukunimi</td>
      <td bgcolor='#dddddd'><input type='text' name='sukunimi' size='30'></td>
    </tr>
    <tr valign='top'>
      <td align='right' bgcolor='#ffeedd'>Etunimi</td>
      <td bgcolor='#dddddd'><input type='text' name='etunimi' size='30'></td>
    </tr>
    <tr valign='top'>
      <td align='right' bgcolor='#ffeedd'>Osoite</td>
      <td bgcolor='#dddddd'><input type='text' name='osoite' size='30'></td>
    </tr>
    <tr valign='top'>
      <td align='right' bgcolor='#ffeedd'>Puhnro</td>
      <td bgcolor='#dddddd'><input type='text' name='puhnro' size='30'></td>
    </tr>
    <tr valign='top'>
      <td align='right' bgcolor='#ffeedd'>Email</td>
      <td bgcolor='#dddddd'><input type='text' name='email' size='30'></td>
    </tr>
    </table>
<input type='submit' name='action' value='Tallenna' onclick="javascript: return confirm('Hyväksy muutokset?')">
</form>

FORMEND;

echo $forms;
}


?>