<?php

	$servername = "localhost";
	$username = "root";
	$password = "Tawinnie";

	$database = "business";

	// Create a connection
	$dbconnect = mysqli_connect($servername,$username, $password, $database);

	//check if database is connected

	if($dbconnect) 
	{
		return;
	
	}
	else 
	{
		die("Failed to connect database". mysqli_connect_error());
	}
	
?>
