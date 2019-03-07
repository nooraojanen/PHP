<title>Websivu</title>
<meta charset="UTF-8">

<?php

class Websivu {
   // Luokan attribuutit
   // Mahdolliset avainsanat: public, protected, private
   protected $otsikko; // Mahdollisen oletusarvon tulee olla vakio,
   protected $avainsanat;  //  ei esim. muuttuja
   protected $sisalto;

   // Konstruktori vain avainsanalla __construct (PHP5)
   function __construct($otsikko, $avainsanat) {
      $this->otsikko = $otsikko; // $this viittaa olioon itseensä
      $this->avainsanat  = $avainsanat;
    }
    
   // Destruktori vain avainsanalla __destruct
    function __destruct() {
        $this->otsikko = NULL; 
        $this->avainsanat  = NULL;
        $this->sisalto  = NULL;
    }
    
    public function asetaBodyelementinSisalto($data) {
       $this->sisalto = $data;
    }
    
    public function naytaSivu() {
       echo "<html><head>\n";
       $this->tulostaOtsikkoelementti();
       echo "</html><body>\n";
       echo $this->sisalto;
       echo "</body></html>\n";
    }
    
    private function tulostaOtsikkoelementti() {
        echo "<title>$this->otsikko</title>";
    }

    private function tulostaAvainsanaelementti() {
        echo "<meta name='keywords' content='$this->avainsanat'>";
    }

}

?>