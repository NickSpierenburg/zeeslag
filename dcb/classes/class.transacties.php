<?php

class transactie {
	private $id;
	private $verzender;
	private $ontvanger;
	private $waarde;
	private $type;
	private $opmerking;

	/*################## GETTERS ##################*/
	function getId() {
		return $this->id;
	}

	function getVerzender() {
		return $this->verzender;
	}

	function getOntvanger() {
		return $this->ontvanger;
	}

	function getWaarde() {
		return $this->waarde;
	}

	function getType() {
		return $this->type;
	}

	function getOpmerking() {
		return $this->opmerking;
	}
        
	/*################## SETTERS ##################*/

	function __construct($vz, $ov, $wr, $tp, $op) {
		$this->verzender = $vz;
		$this->ontvanger = $ov;
		$this->waarde = $wr;
		$this->type = $tp;
		$this->opmerking = $op;
	}

}

?>
