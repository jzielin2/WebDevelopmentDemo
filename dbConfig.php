<?php

// Create connection

function dbConnect(){
	$servername = "localhost";
	$username = "root";
	$password = "Deloitte.1";
	$database = "WebDevDemo";

	$conn = mysqli_connect($servername, $username, $password, $database);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
		return;	
	}
	else{
		return $conn;
	}
}

?>