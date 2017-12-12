<?php 
	
	include 'config.php';

	session_start();

	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}

	$username = $_SESSION['username'];

	$checkIn = $checkOut = $reservation = $roomType ="";
	$check_err = $reservation_err = $roomType_err ="";


    if($_SERVER["REQUEST_METHOD"] == "POST"){



        $_SESSION['checkin_date'] = $_POST["dayStart"];
        $_SESSION['checkout_date'] = $_POST["dayEnd"];

         $date1 = date($_POST["dayStart"]);
         $date2 = date($_POST["dayEnd"]);

        if(strtotime($date1) < strtotime($date2)){

          $check_err = "Check-out date should not contradict with Check-in date";
        }
        
        else{

        	$checkIn = $date1;
            $checkOut = $date2;
        }

        if(empty(trim($_POST["rname"]))){
        	$reservation_err = "Required";
        }

        else{
        	$reservation = trim($_POST["rname"]);
        }


        if($_POST["roomType"] == "solo"){
        	 $roomType = "solo";

        }
        elseif ($_POST["roomType"] == "twin") {
        	$roomType = "twin";

        }
        elseif ($_POST["roomType"] == "queen") {
        	$roomType = "queen";

        }
        elseif ($_POST["roomType"] == "king") {
        	$roomType = "king";

        }
        elseif ($_POST["roomType"] == "suite") {
        	$roomType = "suite";

	    }
	    elseif ($_POST["roomType"] == "penthouse") {
        	$roomType = "penthouse";

        }

        elseif (empty(trim($_POST["roomType"]) )){
        	$roomType_err = "Please Select";
        }


     if(empty($check_err) && empty($reservation_err) && empty($roomType_err)){

     	$sql ="INSERT INTO reservation (check_in, check_out, reserve_name, room_type, clientId) VALUES ( FROM_UNIXTIME(?),FROM_UNIXTIME(?),?,?,?)";

     	if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'i,i,s,s,i', $param_checkIn, $param_checkOut,$param_reserve,$param_roomType,$param_clientId);

            $param_checkIn = $checkIn;
            $param_checkOut = $checkOut;
            $param_reserve = $reservation;
            $param_roomType = $roomType;
            $param_clientId = $_SESSION['id'];

		 }

		 else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);

							  
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

						<nav>
				<div class="header">	
					     <?php
                            include 'header.php';
                         ?> 

				</div>
			</nav>		
				
		<div class="row">
			<div class="col-lg-12">	
				 <?php
                        include 'headbutton.php';
                  ?> 

					<div class="contDate">
						<h1 class="topLabel">DIRECT BOOKING</h1>
						<h5 class="subLabel">BEST RATE GUARANTEED!</h5>

					<div class="fullForm">			

						<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?> " id="form" method="post" >	
							
						<div class="form-group <?php echo (!empty($check_err)) ? 'has-error' : ''; ?>">
							<div class="datestart" >
								<h4 class="begin">Check-in Date</h4>
								<input type="date" name="dayStart" id="dayStart" class="start" required/>
							</div><label></label>

							<div class="dateend">
								<h4 class="stop">Check-out Date</h4>
								<input type="date" name="dayEnd" id="dayEnd" class="end" required>
							</div>
							<span ><?php echo $check_err; ?></span>

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

				<div class="footer">
					  	<?php
					  	 	include 'footer.php';
					  	 ?>	
				</div>	

	</div>

	
</body>
</html>