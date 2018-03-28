<?php

require_once('credentials.php');
$conn = createconnection();

require_once('classes/classes.php');

// $bank = new Bank('De Centrale Bank', 'DCB');
// echo $bank->getBankCode();

// $bank->setBankNaam('Decentrale Bank');
// echo $bank->getBankNaam();


$user = new Gebruiker(1, 'Admin', '12345', 'Nick', '', 'Spierenburg', 'Hr', 1);
// $user->setId(1);
// $user->setGebruikersnaam('Admin');
// $user->setWachtwoord('12345');
// $user->setVoornaam('Nick');
// $user->setAchternaam('Spierenburg');
// $user->setAanhef('Hr');
// $user->setRechten(1);

echo 'Welkom, ' . $user->getVolledigeNaam();
echo '<br>';
echo 'Uw gekozen gebruikersnaam is ' . $user->getGebruikersnaam() . ' met als wachtwoord ' . $user->getWachtwoord();

?>
