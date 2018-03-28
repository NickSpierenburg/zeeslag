<?php

function createconnection() {
	$host="localhost";
	$dbusername="root"; 
	$dbpassword="";
	$db_name="mcbdb";

	$conn = mysqli_connect("$host", "$dbusername", "$dbpassword", "$db_name")or die("cannot connect");
	return $conn;
}

?>