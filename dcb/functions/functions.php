<?php

function vindGebruiker($conn, $gebruikersnaam) {
	$sql = 'SELECT * FROM dcb_gebruikers WHERE gebruikersnaam = "'.$gebruikersnaam.'"';
	$result = $conn->query($sql);

	$count = $result->num_rows;
	if($count > 0) {
		while($row = $result->fetch_assoc()) {
			$jsonRow = json_encode($row);
			print_r($jsonRow);
		}
		return true;
	} else {
		return false;
	}
}

function ZoekGebruiker($gebruikersnaam){
    $conn = createconnection();       
     $sql = 'SELECT * FROM dcb_gebruikers WHERE gebruikersnaam = "'.$gebruikersnaam.'"';
     return $conn->query($sql);
}
