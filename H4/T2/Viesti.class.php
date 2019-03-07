<title>Vieraskirja</title>
<meta charset="UTF-8">

<?php
class Viesti {
    private $heading; // otsikko
    private $content; // sisältö
    private $sender; // lähettäjä
    private $date; // pvm

    function __construct($heading, $content, $sender, $date) {
        $this->heading = $heading;
        $this->content = $content;
        $this->sender = $sender;
        $this->date = $date;
    }

    function __destruct() {
        $this->heading = NULL;
        $this->content = NULL;
        $this->sender = NULL;
        $this->pvm = NULL;
    }

    function __toString() {
        return "<h4>$this->heading</h4>" . "<p>$this->date<br><br>" . "$this->sender<br>" . "<br>$this->content</p>";
    }
}

?>