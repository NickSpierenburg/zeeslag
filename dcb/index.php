<?php

require_once('credentials.php');
$conn = createconnection();

require_once('classes/classes.php');

// $bank = new Bank('De Centrale Bank', 'DCB');
// echo $bank->getBankCode();

// $bank->setBankNaam('Decentrale Bank');
// echo $bank->getBankNaam();


$user = new Gebruiker(1, 'Admin', '12345', 'Nick', '', 'Spierenburg', 'Hr', 1);

echo 'Welkom, ' . $user->getVolledigeNaam();
echo '<br>';
echo 'Uw gekozen gebruikersnaam is ' . $user->getGebruikersnaam() . ' met als wachtwoord ' . $user->getWachtwoord();
echo '<hr>';
// $user->maakGebruiker($conn); //WERKT!

?>
