<?php
class Rekening {
	private $nummer;
	private $user_id;
	public $balans;

	/*################## GETTERS ##################*/
	function getRekeningNummer() {
		return $this->nummer;
	}

	function getUser() {
		return $this->user_id;
	}

	function getBalans() {
		return $this->balans;
	}
        
	/*################## SETTERS ##################*/

	function __construct($nr, $ui, $bl) {
		$this->nummer = $nr;
		$this->user_id = $ui;
                $this->balans = $bl;
	}
        function maakRekening($conn = false) {
            $sqlMaakRekening = 'INSERT INTO dcb_rekening (rekening_nummer, user_id, balans) VALUES ("'.$this->nummer.'","'.$this->user_id.'","'.$this->balans.'")';
            $conn->query($sqlMaakRekening);
            echo $sqlMaakRekening;
	}

}
