<?php 
	
	include 'config.php';
	session_start();


	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}
////////////////////////////////////////////////////////

	$count ="";
    $checkClient = $_SESSION['id'];

	$sql = "SELECT clientId FROM reservation WHERE clientId = ($checkClient) ";


	$result = mysqli_query($link,$sql);

	if(mysqli_num_rows($result)>0){

		header("location:clientProfile.php");

		$_SESSION['Warning'] = TRUE;

	
	}


///////////////////////////////////////////////////////

	$username = $_SESSION['username'];
// 	 
	$checkIn = $checkOut = $roomNum = $clientId = $charge = $roomName =  $warn = $rate = $days= "";
 	 $roomType_err ="";
		
	$check_err = "Please Fill All Information";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        	
         $clientId = $_SESSION['id'];

         $date1 = $_POST['dayStart'];
         $date2 = $_POST['dayEnd'];
         $curdate = date('Y-m-d');

        if($date1<$curdate){

        	$check_err = "Invalid Date. Please check the date today";

        }

        elseif(strtotime($date1) > strtotime($date2)){

          $check_err = "Check-out date should not contradict with Check-in date";
        }

        else{

        	$checkIn = $date1;
            $checkOut = $date2;
        }


        if($_POST["roomType"] == "solo"){
        	 $roomNum = 1;
        	 $roomName = "Modgud's Gjoll Solo Deluxe";
        	 $rate = 2500;
        }
        elseif ($_POST["roomType"] == "twin") {
        	$roomNum = 2;
        	$roomName = "Freyr and Freya's Twin Double Bed Deluxe";
        	$rate = 3500;

        }
        elseif ($_POST["roomType"] == "queen") {
        	$roomNum = 3;
        	$roomName = "Frigg's Throne and Boudoir";
        	$rate = 8499;

        }
        elseif ($_POST["roomType"] == "king") {
        	$roomNum = 4;
        	$roomName = "Odin's Throne and Bedchamber";
        	$rate = 9399;

        }
        elseif ($_POST["roomType"] == "suite") {
        	$roomNum = 5;
        	$roomName = "Idun's Garden and Suite";
        	$rate = 15000;

	    }
	    elseif ($_POST["roomType"] == "penthouse") {
        	$roomNum = 6;
        	$roomName = "Heimdall's Rainbow Bridge Penthouse";
        	$rate = 16000;

        }
		
		 $chin = str_replace("-", "", $checkIn);
		 $chout = str_replace("-", "", $checkOut);
		 $chinout = $chout - $chin;
 		
 		$days = $chinout;
		 
		 if($chinout==0){
		 	$days =1;
		 }

		 $charge = $rate *  $days;
	
		 
		 /////////////////////////////



		$sql1 = "SELECT room_id FROM reservation WHERE check_out >= '$checkIn' AND check_out <= '$checkOut'";

			$result1 = mysqli_query($link,$sql1);

			if(mysqli_num_rows($result1)>0){

				while($row =mysqli_fetch_array($result1)){

					$roomResult = $row['room_id'];

					if($roomNum == $roomResult){

					$roomType_err = TRUE;
					$check_err = $roomName." is Not Available at that date";


					}

				}

			
			}




		$sql2 = "SELECT room_id FROM reservation WHERE (check_in = '$checkIn' and check_out > '$checkOut')";

			$result2 = mysqli_query($link,$sql2);

			if(mysqli_num_rows($result2)>0){

				while($row =mysqli_fetch_array($result2)){

					$roomResult = $row['room_id'];

					if($roomNum == $roomResult){

					$roomType_err = TRUE;
					$check_err = $roomName." is Not Available at that date";


					}

				}

			
			}


		$sql3 = "SELECT room_id FROM reservation WHERE check_in > '$checkIn' AND check_out >= '$checkOut'";

			$result3 = mysqli_query($link,$sql3);

			if(mysqli_num_rows($result3)>0){

				while($row =mysqli_fetch_array($result3)){

					$roomResult = $row['room_id'];

					if($roomNum == $roomResult){

					$roomType_err = TRUE;
					$check_err = $roomName." is Not Available at that date";


					}

				}

			
			}
		 /////////////////////////////


     	if(empty($reservation_err) && empty($roomType_err)){

	     	$sql = " INSERT INTO reservation (check_in, check_out, room_id, clientId, room_charge) VALUES ('$checkIn','$checkOut','$roomNum','$clientId', '$charge') ";

	     	if(mysqli_query($link, $sql)){

	     		   $_SESSION['roomName'] = $roomType;
	               header("location: clientprofile.php");
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
						<h1 class="topLabel">DIRECT BOOKING</h1><label style="float: right;">
						<h5 class="subLabel">BEST RATE GUARANTEED!</h5>

					<div class="fullForm">			



						<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']);?> " id="form" method="post" >	
							
						<div class="form-group <?php echo (!empty($check_err)) ? 'has-error' : ''; ?>">	

							<div class="alert alert-danger" data-dismiss="alert" id="alert" role="alert" style="width:500px; font-size: 13px; margin-top: -55px; padding-bottom: 10px;"><?php echo $check_err; ?></div>

							<div class="datestart" >
								<h4 class="begin">Check-in Date </h4>
								<input type="date" name="dayStart" id="dayStart" class="start" value="<?php echo $checkIn;?>" required/>
							</div>
							
							<div class="dateend">
								<h4 class="stop">Check-out Date</h4>
								<input type="date" name="dayEnd" id="dayEnd" class="end" value="<?php echo $checkOut;?>"  required>
							</div>
							
						</div>

					<?php

						$sql = "SELECT room_type FROM reservation";



					?>
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