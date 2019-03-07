<table>

<?php

for($i=1; $i<=7; $i++) {
    $tvari = taustavari();
    echo "<tr bgcolor='$tvari'><td>Rivi $i</tr></td>";
}
 
function taustavari() {
static $ftvari = '#ff0';
   if($ftvari == '#ff0') {
       $ftvari = '#fff';
   } else {
       $ftvari = '#ff0';
   }
    return $ftvari;
}    
    
?>
    
</table>