<?php

	$servername = "localhost";
	$username = "root";
	$password = "Tawinnie";

	$database = "business";

	// Create a connection

	$db = mysqli_connect($servername,$username, $password, $database);

	//check if database is connected

	if($db) 
	{
		return;
	
	}
	else 
	{
		die("Failed to connect database". mysqli_connect_error());
	}
	
?>
