<?php
    require_once('../credentials.php');
    $conn = createconnection();

    require_once('../classes/classes.php');
    require_once('../functions/functions.php');
    
    $sql = "SELECT `rekening_nummer`,`balans` FROM `dcb_rekening` WHERE user_id='".$_SESSION['gebruiker']['gebruikersnaam']."'";
    $query = $conn->query($sql);
//    $result = mysqli_fetch_assoc($query);
    while($row = $query->fetch_assoc()){
                    echo 'Rekenings nummer: '.$row['rekening_nummer'].' balans: €',$row['balans'].'<hr>';
                }
