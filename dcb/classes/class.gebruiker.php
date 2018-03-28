<?php

class Gebruiker {
	private $id;
	private $gebruikersnaam;
	private $wachtwoord;
	private $voornaam;
	private $tussenvoegsel;
	private $achternaam;
	private $aanhef;
	private $rechten;

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
	function setId($id) {
		$this->id = $id;
	}

	function setGebruikersnaam($gn) {
		$this->gebruikersnaam = $gn;
	}

	function setWachtwoord($ww) {
		$this->wachtwoord = $ww;
	}

	function setVoornaam($vn) {
		$this->voornaam = $vn;
	}

	function setTussenvoegsel($tv) {
		$this->tussenvoegsel = $tv;
	}

	function setAchternaam($an) {
		$this->achternaam = $an;
	}

	function setAanhef($ah) {
		$this->aanhef = $ah;
	}

	function setRechten($re) {
		$this->rechten = $re;
	}

	/*################## DAO ##################*/
	function maakGebruiker($conn = false) {
		$sql = 'INSERT INTO dcb_gebruikers (gebruikersnaam,wachtwoord,voornaam,tussenvoegsel,achternaam,aanhef,rechten) VALUES ("'.$this->gebruikersnaam.'","'.$this->wachtwoord.'","'.$this->voornaam.'","'.$this->tussenvoegsel.'","'.$this->achternaam.'","'.$this->aanhef.'",'.$this->rechten.')';
		$conn->query($sql);
	}

}

?>
