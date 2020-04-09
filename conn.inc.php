<?php

	/* php latest version database connection*/
	$conn = new mysqli('localhost', 'root', '', 'sportsgoa');
	//Check for connection error
	if($conn->connect_error)
	{
		die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
	}

	/* php old version database connection*/
	$server ="localhost";
	$user="root";
	$pass="";
	$database = "sportsgoa";
	$connection = mysql_connect($server, $user, $pass) or die ('Could not connect: '.mysql_error());
	mysql_select_db($database,$connection);  


	/* connection for userprofile */	
	// DB credentials.
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','sportsgoa');
	// Establish database connection.
	try
	{
		$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	}
	catch (PDOException $e)
	{
		exit("Error: " . $e->getMessage());
	}

?>	