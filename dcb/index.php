<?php

require_once('credentials.php');
$conn = createconnection();

require_once('classes/classes.php');
require_once('functions/functions.php');

$bank = new Bank('De Centrale Bank', 'DCB');

// vindGebruiker($conn, 'Admin');

// $bank->setBankNaam('Decentrale Bank');
// echo $bank->getBankNaam();


// $user = new Gebruiker(1, 'Admin', '12345', 'Nick', '', 'Spierenburg', 'Hr', 1);
// $rekening = new rekening('MCB12345', $user->getGebruikersnaam(), 5000);
// echo 'Welkom, ' . $user->getVolledigeNaam();
// echo '<br>';
// echo 'Uw gekozen gebruikersnaam is ' . $user->getGebruikersnaam() . ' met als wachtwoord ' . $user->getWachtwoord();
// //$user->maakGebruiker($conn); //WERKT!
// echo '<br>Uw nieuwe rekenings nummer is '. $rekening->getRekeningNummer();
// echo '<br>';
// echo 'Met uw totaale balans is :'. $rekening->getBalans();
// //$rekening->maakRekening($conn); //WERKT OOK
// echo '<br><hr>';

// $user_2 = new Gebruiker(2, 'Geert', '54321', 'Geert', '', 'Schippers', 'Hr', 1);
// $rekening_2 = new rekening('MCB00001',$user_2->getGebruikersnaam(), 5000);
// echo 'Welkom, ' . $user_2->getVolledigeNaam();
// echo '<br>';
// echo 'Uw gekozen gebruikersnaam is ' . $user_2->getGebruikersnaam() . ' met als wachtwoord ' . $user_2->getWachtwoord();
// //$user_2->maakGebruiker($conn); //WERKT!
// echo '<br>Uw nieuwe rekenings nummer is '. $rekening_2->getRekeningNummer();
// echo '<br>';
// echo 'Met uw totaale balans is :'. $rekening_2->getBalans();
// //$rekening_2->maakRekening($conn); //WERKT OOK
// echo '<hr>';

// $transactie =  new transactie($rekening_2, $rekening, '6000', 'handmatig', 'test');
// echo $transactie->getVerzender()->getRekeningNummer().' stuurt '.$transactie->getWaarde().' naar '.$transactie->getOntvanger()->getRekeningNummer().' type: '.$transactie->getType().' Met als opmerking '.$transactie->getOpmerking();
// echo '<hr>';
// $transactie->MaakOver($conn, $rekening_2, $rekening);
?>

<html>
<head>
	<script>
		function vindGebruiker(gn, callback) {

			var xhr = new XMLHttpRequest();
			var url = 'functions/api.php';
			var params = 'action=vindGebruiker&gebruikersnaam='+gn;
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

			xhr.onreadystatechange = function() {
				if(xhr.readyState === 4 && xhr.status === 200) {
					if(xhr.responseText) {
						var gebruiker = JSON.parse(xhr.responseText);
						callback(gebruiker);
					} else {
						callback(false);
					}
				}
			}

			xhr.send(params);
		}

		function maakGebruiker() {
			var gebruikersnaam = document.getElementById('gn').value;
			var wachtwoord = document.getElementById('ww'.value);
			var voornaam = document.getElementById('vn').value;
			var tussenvoegsel = document.getElementById('tv').value;
			var achternaam = document.getElementById('an').value;
			var aanhef = document.getElementById('ah').value;
			var rechten = document.getElementById('re').value;

			vindGebruiker(gebruikersnaam, function(gebruiker) {
		        if (gebruiker) {
		        	console.log("Gebruiker bestaat al");
		        } else {
		        	console.log("Gebruikersnaam beschikbaar, we gaan hem aanmaken!");
		        }
		    });
		}
	</script>
</head>
<body>
	<input type="text" id="gn" placeholder="Gewenste gebruikersnaam"><br>
	<input type="password" id="ww" placeholder="Wachtwoord"><br>
	<input type="text" id="vn" placeholder="Voornaam"><br>
	<input type="text" id="tv" placeholder="Tussenvoegsel"><br>
	<input type="text" id="an" placeholder="Achternaam"><br>
	<input type="text" id="ah" placeholder="Aanhef"><br>
	<input type="text" id="re" value="0" hidden>
	<input type="button" value="Registreer" onclick="maakGebruiker()">
</body>
</html>