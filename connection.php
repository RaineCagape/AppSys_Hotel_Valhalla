<?php


		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbhotel= "myDB";

		$conn = new mysqli($servername, $username, $password, $dbhotel);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";


		$select_db = mysql_select_db('dbhotel') or die("Error in selecting database");

		
	?>
