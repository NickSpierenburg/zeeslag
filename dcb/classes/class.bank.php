<?php

class Bank {
	
	private $bankNaam;
	private $bankCode;

	function __construct($bankNaam, $bankCode) {
		$this->bankNaam = $bankNaam;
		$this->bankCode = $bankCode;
	}

	function getBankCode() {
		return $this->bankCode;
	}

	function getBankNaam() {
		return $this->bankNaam;
	}

	function setBankCode($bankCode) {
		$this->bankCode = $bankCode;
	}

	function setBankNaam($bankNaam) {
		$this->bankNaam = $bankNaam;
	}

}

?>
