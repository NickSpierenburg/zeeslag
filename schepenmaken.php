<script>
        function versturen() {
        var naam = document.getElementById("schipnaam"). value;
        var lengte = document.getElementById("schiplengte") . value;
        document.location = "schepenmaken.php?naam=" + naam + "&lengte=" + lengte;
    }
    
</script>

<?php


$servername = 'localhost;';
$username = 'root';
$password = 'root';
$db = 'ZeeslagNickAlex';

$conn = mysqli_connect ($servername, $username, $password, $db);



echo '<input type = "text" placeholder = "Hoe heet je schip?" id="schipnaam">';
echo '<input type = "text" placeholder = "Hoe lang is je schip?" id="schiplengte">';
echo '<input type = "button" value = "Versturen" onclick = versturen()>';


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

