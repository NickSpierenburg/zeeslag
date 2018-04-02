<?php
    require_once('../credentials.php');
    $conn = createconnection();

    require_once('../classes/classes.php');
    require_once('../functions/functions.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['verzender'])){
            $verz = $_POST['verzender'];
            $sqlVerzender = 'SELECT `rekening_nummer`, `user_id`, `balans` FROM `dcb_rekening` WHERE rekening_nummer="'.$verz.'"';
            $vzResult = $conn->query($sqlVerzender);
            $vz = mysqli_fetch_assoc($vzResult);
            $ontv = $_POST['ontvanger'];
            $sqlOntvanger = 'SELECT `rekening_nummer`, `user_id`, `balans` FROM `dcb_rekening` WHERE rekening_nummer="'.$ontv.'"';
            $ovResult = $conn->query($sqlOntvanger);
            $ov = mysqli_fetch_assoc($ovResult);
            $wr = $_POST['waarde'];
            $tp = $_POST['type'];
            $op = $_POST['opmerking'];
            $trans = new Transactie($vz, $ov, $wr, $tp, $op);
            print_r($trans);
            $trans->MaakOver($conn);
        }
    }
?>

<div>
    <h3>Registreer een nieuwe rekening</h3>
    <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span>verzender</span><input type='text' id='verzender' name='verzender' placeholder='verzender'><br>
        <span>ontvanger</span><input type='text' id='ontvanger' name='ontvanger' placeholder='ontvanger'><br>
        <span>waarde</span><input type='number' id='waarde' name='waarde' placeholder='waarde'><br>
        <span>type</span><input type='text' id='type' name='type' placeholder='type'><br>
        <span>opmerking</span><input type='opmerking' id='opmerking' name='opmerking' placeholder='opmerking'><br>
        <input type='submit' value='submit'><br>
    </form>
</div>


