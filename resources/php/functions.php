<?php
	date_default_timezone_set('America/Los_Angeles');
	
	if($include_path) {
		include($include_path."../secrets.php");
	} else {
		include("../secrets.php");
	}

	// Connect to database based on server
	if($_SERVER['SERVER_NAME'] == "localhost" || preg_match("/ngrok.io/", $_SERVER['SERVER_NAME']) || $_SERVER['SERVER_NAME'] == $server["local"]["name"]) {
		$db = new mysqli($database["local"]["server"], $database["local"]["username"], $database["local"]["password"], $database["local"]["database-name"]);
		if($db->connect_error) {
			die("Connection failed: ".$db->connect_error);
		}
	} else {
		$db = new mysqli($database["remote"]["server"], $database["remote"]["username"], $database["remote"]["password"], $database["remote"]["database-name"]);
		if($db->connect_error) {
			die("Connection failed: ".$db->connect_error);
		}
	}

	mysqli_set_charset($db, 'UTF8');
?>