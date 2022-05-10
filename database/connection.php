<?php
	function openCon() {
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$db = "jokedb";
		
		$con = new mysqli($servername, $username, $password, $db);
		
		if ($con->connect_error) {
			die("Connection failed: " . $con->connect_error);
		}
		
		return $con;
	}
	
	function closeCon($con) {
		$con -> close();
	}
?>