<?php
	try{
		// Database connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "cms";

		$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	} catch(PDOException $e)
	{
		exit('There seems to be something wrong with the Database.');
	}
?>