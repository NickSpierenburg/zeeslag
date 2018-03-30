<?php
session_start();

require_once('../credentials.php');
$conn = createconnection();

require_once('../classes/classes.php');

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
		}

		break;

	case 'maakGebruiker':
		$gebruikersnaam = $_REQUEST['gebruikersnaam'];
		$wachtwoord = $_REQUEST['wachtwoord'];
		$voornaam = $_REQUEST['voornaam'];
		$tussenvoegsel = $_REQUEST['tussenvoegsel'];
		$achternaam = $_REQUEST['achternaam'];
		$aanhef = $_REQUEST['aanhef'];
		$rechten = $_REQUEST['rechten'];

		$options = [
		    'cost' => 12,
		];
		$wachtwoord = password_hash($wachtwoord, PASSWORD_BCRYPT, $options);

		$gebruiker = new Gebruiker(0,$gebruikersnaam,$wachtwoord,$voornaam,$tussenvoegsel,$achternaam,$aanhef,$rechten);
		$gebruiker->maakGebruiker($conn);

		var_dump($gebruiker);

		break;

	case 'loginGebruiker':
		$gebruikersnaam = $_REQUEST['gebruikersnaam'];
		$wachtwoord = $_REQUEST['wachtwoord'];

		$sql = 'SELECT * FROM dcb_gebruikers WHERE gebruikersnaam = "'.$gebruikersnaam.'"';
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()) {
			$hash = $row['wachtwoord'];
			if(password_verify($wachtwoord,$hash)) {
				// print_r($row);
				$gebruiker = new Gebruiker($row['id'],$gebruikersnaam,$hash,$row['voornaam'],$row['tussenvoegsel'],$row['achternaam'],$row['aanhef'],$row['rechten']);
				$_SESSION['gebruiker'] = $gebruiker;
				print_r($_SESSION['gebruiker']);
				echo $_SESSION['gebruiker']->getId();
			}
			
		}

		break;
}

?>
