<?php 
	
	include 'config.php';
	session_start();

	$clientId = $_SESSION['id'];

	$sql = " SELECT check_in, check_out, resrve_name,room_id FROM reservation WHERE clientId = ($clientId)";

	 if(mysqli_query($link,$sql)){

	 	mysqli_num_rows($result);

	 	 while($row = mysqli_fetch_array($result)){

	 	$_SESSION['checkIn'] = $row['check_in'];
	 	$_SESSION['checkOut'] = $row['check_out'];
	 	$_SESSION['reserve'] = $row['resrve_name'];
	 	$_SESSION['roomId'] = $row['room_id'];

	 	}
	}

	$sql = " DELETE FROM reservation WHERE clientId = ($clientId)";

	 if(mysqli_query($link,$sql)){

	 	header("location: booking.php");
	 }

	 

?>