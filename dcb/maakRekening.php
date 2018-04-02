<?php
    require_once('credentials.php');
    $conn = createconnection();

    require_once('classes/classes.php');
    require_once('functions/functions.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rekeningNummer = $_POST['rekeningsnummer'];
        $userId = $_POST['userID'];
        $balans = $_POST['balans'];
        $rekening = new rekening($rekeningNummer,$userId,$balans);
        $rekening->maakRekening($conn);
    }
    
    
?>

<div>
    <h3>Registreer een nieuwe rekening</h3>
    <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>rekenings nr. </span><input type='text' id='rekeningNummer' name='rekeningsnummer' placeholder='12345'><br>
        <span>userID </span><input type='text' id='userId' name='userID' placeholder='gebruikersnaam'><br>
        <span>balans </span><input type='number' id='balans' name='balans' placeholder='balans'><br>
        <input type='submit' value='submit'><br>
    </form>
</div>

