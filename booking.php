<?php 
	
	include 'config.php';

	session_start();

	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}

	$username = $_SESSION['username'];
// 
	$checkIn = $checkOut = $reservation = $roomType = $clientId =  "";
	$check_err =  $reservation_err = $roomType_err ="";
	

    if($_SERVER["REQUEST_METHOD"] == "POST"){

         $date1 = $_POST['dayStart'];
         $date2 = $_POST['dayEnd'];

        if(strtotime($date1) > strtotime($date2)){

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
        	$roomType = "kingr";

        }
        elseif ($_POST["roomType"] == "suite") {
        	$roomType = "suite";

	    }
	    elseif ($_POST["roomType"] == "penthouse") {
        	$roomType = "penthouse";
        }

        elseif (empty(trim($_POST["roomType"]))){
        	$roomType_err = "Please Select";
        }
		
		 $clientId = $_SESSION['id'];


     	if(empty($check_err) && empty($reservation_err) && empty($roomType_err)){

	     	$sql = " INSERT INTO reservation (check_in, check_out, reserve_name, room_type, clientId) VALUES ('$checkIn','$checkOut','$reservation','$roomType','$clientId') ";

	     	if(mysqli_query($link, $sql)){

	               header("location: clientprofile.php");
	            } 	

			else{
		         
		          ?>
           			 <script type="text/javascript">
           			 alert('Error occured while inserting your data');
            		</script>
            	  <?php

				}


		}
	           
    }

	  
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

	<script type="text/javascript">

	   window.setTimeout(function() {
	    $(".alert").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove();  });}, 4000);


	</script>

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

							<div class="alert alert-danger" data-dismiss="alert" id="alert" role="alert" style="width:500px; font-size: 13px; margin-top: -55px; padding-bottom: 10px;"><?php echo $check_err; ?></div>

							<div class="datestart" >
								<h4 class="begin">Check-in Date</h4>
								<input type="date" name="dayStart" id="dayStart" class="start" value="<?php echo $checkIn;?>" required/>
							</div>
							
							<div class="dateend">
								<h4 class="stop">Check-out Date</h4>
								<input type="date" name="dayEnd" id="dayEnd" class="end" value="<?php echo $checkOut;?>"  required>
							</div>
							
						</div>

							<div class="reservename">
								<h4 class="reserveNme">Reservation Name</h4>
								<input type="text" name="rname" id="rname" class="resname" value="<?php echo $reservation?>" placeholder="Enter Name" required>
							</div>
<!-- name="text" -->
							<div class="roomType">
								<h4 class="roomLabel">Room Type</h4>
								<select  name="roomType" id="roomType" class="room" required>
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