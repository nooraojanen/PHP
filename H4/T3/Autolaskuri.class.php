<title>Autolaskuri</title>
<meta charset="UTF-8">

<?php
	class Autolaskuri{
		private $model;
		private $amount;

		function __construct($model) {
			$this->model = $model;
			$this->amount = 0;
		}

		function __destruct() {
			$this->model = NULL;
			$this->amount = NULL;
		}

		function reset() { // nollaus
			$this->amount = 0;
		}

		function increase() { // lisäys
			$this->amount++;
		}

		function __toString() {
        	return "$this->amount";
    	}
	}
?>