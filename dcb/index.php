<?php

require_once('credentials.php');
$conn = createconnection();

require_once('classes/classes.php');

// $bank = new Bank('De Centrale Bank', 'DCB');
// echo $bank->getBankCode();

// $bank->setBankNaam('Decentrale Bank');
// echo $bank->getBankNaam();


$user = new Gebruiker(1, 'Admin', '12345', 'Nick', '', 'Spierenburg', 'Hr', 1);
$rekening = new rekening('MCB12345', $user->getGebruikersnaam(), 5000);
echo 'Welkom, ' . $user->getVolledigeNaam();
echo '<br>';
echo 'Uw gekozen gebruikersnaam is ' . $user->getGebruikersnaam() . ' met als wachtwoord ' . $user->getWachtwoord();
//$user->maakGebruiker($conn); //WERKT!
echo '<br>Uw nieuwe rekenings nummer is '. $rekening->getRekeningNummer();
echo '<br>';
echo 'Met uw totaale balans is :'. $rekening->getBalans();
//$rekening->maakRekening($conn); //WERKT OOK
echo '<br><hr>';

$user_2 = new Gebruiker(2, 'Geert', '54321', 'Geert', '', 'Schippers', 'Hr', 1);
$rekening_2 = new rekening('MCB00001',$user_2->getGebruikersnaam(), 5000);
echo 'Welkom, ' . $user_2->getVolledigeNaam();
echo '<br>';
echo 'Uw gekozen gebruikersnaam is ' . $user_2->getGebruikersnaam() . ' met als wachtwoord ' . $user_2->getWachtwoord();
//$user_2->maakGebruiker($conn); //WERKT!
echo '<br>Uw nieuwe rekenings nummer is '. $rekening_2->getRekeningNummer();
echo '<br>';
echo 'Met uw totaale balans is :'. $rekening_2->getBalans();
//$rekening_2->maakRekening($conn); //WERKT OOK
echo '<hr>';

$transactie =  new transactie($rekening_2, $rekening, '6000', 'handmatig', 'test');
echo $transactie->getVerzender()->getRekeningNummer().' stuurt '.$transactie->getWaarde().' naar '.$transactie->getOntvanger()->getRekeningNummer().' type: '.$transactie->getType().' Met als opmerking '.$transactie->getOpmerking();
echo '<hr>';
$transactie->MaakOver($conn, $rekening_2, $rekening);
?>
