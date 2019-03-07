<title>Vieraskirja</title>
<meta charset="UTF-8">

<?php
class Vieraskirja {
    private $viestit = array(); // Lisätyt viestit tallennetaan tähän taulukkoon
     
    function __construct() {

    }

    function __destruct() {
        $this->viestit = NULL;
    }
 
    public function lisaa($viesti) {
        array_push($this->viestit, $viesti);
    }
 
    public function poista($viesti) {
        $size = sizeof($this->viestit);
        for($i = 0; $i < $size; $i++) {
            if($this->viestit[$i] == $viesti) {
                unset($this->viestit[$i]);
                $this->viestit = array_values($this->viestit);
                echo "<b>Viesti " . ($i + 1) . " poistettu</b><br>";
                break;
            }
        }
    } 
 
    public function tulosta() {
        $size = sizeof($this->viestit);
        for($i = 0; $i < $size; $i++) {
            echo $this->viestit[$i];
        }
    } 
 
    public function laskeViestilukumaara() {
        return sizeof($this->viestit);
    } 
}
?>