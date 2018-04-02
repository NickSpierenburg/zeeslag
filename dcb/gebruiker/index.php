<?php 
    session_start();
    require_once('../credentials.php');
    $conn = createconnection();

    require_once('../classes/classes.php');
    require_once('../functions/functions.php');
//    print_r($_SESSION['gebruiker']);
    $gn = $_SESSION['gebruiker']['gebruikersnaam'];
    $nm = $_SESSION['gebruiker']['voornaam'];
    $ts = $_SESSION['gebruiker']['tussenvoegsel'];
    $an = $_SESSION['gebruiker']['achternaam'];
    $ah = $_SESSION['gebruiker']['aanhef'];
?>

<html>
    <head>
        <title>user Overview</title>
    </head>
    <body>
        <h1>Mijn centrale bank</h1>
            <h2>gebruiker : <?php echo $ah.'. '.$nm.' '.$ts.' '.$an; ?></h2>
        <?php 
            include_once '../maakRekening.php'; 
            echo '<h3>Mijn rekeningen:</h3><hr>';
            include_once 'mijnrekeningen.php';
        ?>
            
        <h3>Nieuwe transactie:</h3>
        <?php include_once 'maakTransactie.php';?>
        
</html>
