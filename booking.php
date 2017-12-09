<<<<<<< HEAD
<?php 
	
	include 'config.php';

	session_start();

	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}

	$username = $_SESSION['username'];

?>
=======
<?php

	// Initialize the session
	 require_once 'config.php';
	 session_start();

 	// If session variable is not set it will redirect to login page
  	 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  	 header("location: login.php");
  
   	exit;
	 }

	 $firstname = $_SESSION['firstname'];

	 if($_SERVER["REQUEST_METHOD"]) == "POST"){
		$_SESSION['id'] = $_POST['id'];
		$_SESSION['check_in'] = $_POST['check_in'];
		$_SESSION['check_out'] = $_POST['check_out'];
		$_SESSION['room_type'] = $_POST['room_type'];

		$in = date_create($_POST["check_in"]);
        $out = date_create($_POST["check_out"]);
        
        //difference between two dates
        $valid = date_diff($in,$out);
        $valid = $valid->format("%a");
        $valid = (int) $valid;

        $_SESSION['totalnights'] = $valid;



        if($in >= $out) {
            $errmessage = "Check in/out date invalid!";
           
        } else {
            header("Location: index.php");
        }

    }
}
		
?>

>>>>>>> 8ad4fd45cf3ba0c37123b5ccfc8f5c3e5940efc1

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

						<nav>
				<div class="header">	
<<<<<<< HEAD
					     <?php
                            include 'header.php';
                         ?> 

=======
					<div id="logo"><a href="index.php"><img src="images/logo2.png" style="height: 100px"/></a></div>
>>>>>>> 8ad4fd45cf3ba0c37123b5ccfc8f5c3e5940efc1
				</div>
			</nav>		
				
<<<<<<< HEAD
		<div class="row">
			<div class="col-lg-12">	
				 <?php
                            include 'headbutton.php';
                  ?> 

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

=======
				<div class="row">
					<div class="col-lg-12">	
						<button type="button" class="booking" onclick="window.location.href='booking.php'"> <a href="booking.php" class="nav">Book a Room<br></a></button>
					<button type="button" class="rooms" onclick="window.location.href='room.html'"><a href="room.html" class="nav">Accomodations</a></button>
					<button type="button" class="log" onclick="window.location.href='logout.php'"><a href="logout.php" class="nav">Log Out</a></button>
					<div class="contDate">
						<h1 class="topLabel">DIRECT BOOKING</h1>
						<h5 class="subLabel">BEST RATE GUARANTEED!</h5>

					<div class="fullForm">			

						<form>		

							<div class="datestart">
								<h4 class="begin">Check-in Date</h4>
								<input type="date" name="dayStart" id="dayStart" class="start" <?php if(isset($_SESSION['check_in'])){ echo $_SESSION['check_in'];} else {echo date("Y-m-d");}?>" min="<?php echo date("Y-m-d"); ?>" required/>
							</div>

							<div class="dateend">
								<h4 class="stop">Check-out Date</h4>
								<input type="date" name="dayEnd" id="dayEnd" class="end" <?php if(isset($_SESSION['check_out'])){ echo $_SESSION['check_out'];} else {echo date("Y-m-d");}?>" min="<?php echo date("Y-m-d"); ?>" required>
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

>>>>>>> 8ad4fd45cf3ba0c37123b5ccfc8f5c3e5940efc1
				</div>

					</div>	
				</div>
			</div>

				<div class="footer">
					  	<?php
					  	 	include 'footer.php';
					  	 ?>	
				</div>	

	</div>

	
</body>
</html>