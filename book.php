<?php 
	
	include 'config.php';

	session_start();

	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}

	$username = $_SESSION['username'];

?>

<html>
<head>
	<title>Book a Room | Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<link rel="stylesheet" href="css/booking.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	
	<div class="container">

				<div class="header">	
					<div id="logo"><a href="index.html"><img src="images/logo2.png" style="height: 100px"/></a></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">	
						<button type="button" class="booking"><a href="booking.html" class="nav">Book a Room<br></a></button>
						<button type="button" class="rooms"><a href="room.html" class="nav">Accomodations</a></button>
						<button type="button" class="log"><a href="greetingpage.html" class="nav">Log Out</a></button>

					<div class="contDate">
						<h1 class="topLabel">DIRECT BOOKING</h1>
						<h5 class="subLabel">BEST RATE GUARANTEED!</h5>

					<div class="fullForm">			

						<form>		

							<div class="datestart">
								<h4 class="begin">Check-in Date</h4>
								<input type="date" name="dayStart" id="dayStart" class="start" required/>
							</div>

							<div class="dateend">
								<h4 class="stop">Check-out Date</h4>
								<input type="date" name="dayEnd" id="dayEnd" class="end" required>
							</div>

							<div class="reservename">
								<h4 class="reserveNme">Reservation Name</h4>
								<input type="text" name="rname" id="rname" class="resname" placeholder="Enter Name" required>
							</div>

							<div class="roomType">
								<h4 class="roomLabel">Room Type</h4>
								<select name="text" name="roomType" id="room" class="room" required>
									  <option value="" disabled selected>--Select Room Type--</option>
									  <option value="solo">Modgud's Gjoll Solo Deluxe</option>
									  <option value="twin">Freyr and Freya's Twin Double Bed Deluxe</option>
									  <option value="queen">Frigg's Throne and Boudoir</option>
									  <option value="king">Odin's Throne and Bedchamber</option>
									  <option value="suite">Idun's Garden and Suite</option>
									  <option value="penthouse">Heimdall's Rainbow Bridge Penthouse</option>
									</select>
							</div>

							<input type="submit" value="Book Now!" class="submit">

						</form>

				</div>

					</div>	
				</div>
			</div>

				<div class="footer"></div>			
	</div>

	
</body>
</html>