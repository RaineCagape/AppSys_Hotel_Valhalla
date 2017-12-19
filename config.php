<?php

include 'createDB.php';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dbhotel');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	$sql = "CREATE TABLE IF NOT EXISTS account(id SERIAL, username VARCHAR(200) NOT NULL, password VARCHAR(255) NOT NULL,fname VARCHAR(100) NOT NULL, lname VARCHAR(100) NOT NULL, email VARCHAR(250) NOT NULL, UNIQUE (id))";

	$sql .= "CREATE TABLE IF NOT EXISTS reservation(id SERIAL, check_in DATE NOT NULL, check_out DATE NOT NULL,room_id INT(20) NOT NULL, room_charge INT(20) NOT NULL, clientId INT(20) NOT NULL, UNIQUE (id))";



		if (mysqli_multi_query($link, $sql)){

			$sql1 = "SELECT username FROM account WHERE username = 'admin' ";

			$result = mysqli_query($link,$sql1);

			if(mysqli_num_rows($result)==0){

				$password =password_hash('administrator', PASSWORD_DEFAULT);

			$sql1 = "INSERT INTO account (username, password, fname,lname,email) VALUES ('admin','$password','Administration','Administration',Administration)";

				mysqli_query($link,$sql1);
		    }

	
		

		}

		

?>