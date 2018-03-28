<?php

require_once('../credentials.php');
$conn = createconnection();

$action = '';

if(isset($_REQUEST['action'])) {
	$action = $_REQUEST['action'];
}

switch($action) {
	case 'vindGebruiker':
		$gebruikersnaam = $_REQUEST['gebruikersnaam'];

		$sql = 'SELECT * FROM dcb_gebruikers WHERE gebruikersnaam = "'.$gebruikersnaam.'"';
		$result = $conn->query($sql);
		$count = $result->num_rows;

		if($count > 0) {
			while($row = $result->fetch_assoc()) {
				$jsonRow = json_encode($row);
				print_r($jsonRow);
			}

			return true;
		} else {
			return false;
		}

		// $wachtwoord = $_REQUEST['wachtwoord'];
		// $voornaam = $_REQUEST['voornaam'];
		// $tussenvoegsel = $_REQUEST['tussenvoegsel'];
		// $achternaam = $_REQUEST['achternaam'];
		// $aanhef = $_REQUEST['aanhef'];
		// $rechten = $_REQUEST['rechten'];
		// break;
}

?>
