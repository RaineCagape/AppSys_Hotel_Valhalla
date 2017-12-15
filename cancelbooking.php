<?php 
	
	include 'config.php';
	session_start();

	$clientId = $_SESSION['id'];

	$sql = " DELETE FROM reservation WHERE clientId = ($clientId)";

	 if(mysqli_query($link,$sql)){

	 	header("location: clientprofile.php");
	}

?>