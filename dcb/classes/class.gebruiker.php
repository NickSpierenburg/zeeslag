<?php

class Gebruiker {
	private $id;
	private $gebruikersnaam;
	private $wachtwoord;
	private $voornaam;
	private $tussenvoegsel = "";
	private $achternaam;
	private $aanhef;
	private $rechten;

	/*################## GETTERS ##################*/
	function getId() {
		return $this->id;
	}

	function getGebruikersnaam() {
		return $this->gebruikersnaam;
	}

	function getWachtwoord() {
		return $this->wachtwoord;
	}

	function getVoornaam() {
		return $this->voornaam;
	}

	function getTussenvoegsel() {
		return $this->tussenvoegsel;
	}

	function getAchternaam() {
		return $this->achternaam;
	}

	function getAanhef() {
		return $this->aanhef;
	}

	function getRechten() {
		return $this->rechten;
	}

	function getVolledigeNaam() {
		return $this->aanhef . ' ' . $this->voornaam . ' ' . $this->tussenvoegsel . ' ' . $this->achternaam;
	}

	/*################## SETTERS ##################*/

	function __construct($id, $gn, $ww, $vn, $tv, $an, $ah, $re) {
		$this->id = $id;
		$this->gebruikersnaam = $gn;
		$this->wachtwoord = $ww;
		$this->voornaam = $vn;
		$this->tussenvoegsel = $tv;
		$this->achternaam = $an;
		$this->aanhef = $ah;
		$this->rechten = $re;
	}

}

?>
