<<?php 

	require_once 'config.php';

 ?>
<html>
<head>
	<link rel="stylesheet" href="css/bookingtables.css">
</head>
<body>

<div class="containtables">	

	

		<h3 class="bookinglabel"> Booking Info</h3>

		<?php 
			$roomName ="";

			$sql ="SELECT account.fname, account.lname, account.id, reservation.clientId, reservation.check_in, reservation.check_out, reservation.room_id, reservation.room_charge FROM   reservation LEFT JOIN account ON reservation.clientId  = account.id ORDER BY reservation.id DESC";

			$result = mysqli_query($link, $sql);

			if(mysqli_num_rows($result)>0){

				while($row = mysqli_fetch_array($result)){

					if( $row['room_id'] == 1){

					        	 $roomName = "Solo Deluxe";
					        	  
					        }
					        elseif ($row['room_id'] == 2) {
					        	
					        	$roomName = "Double Bed Deluxe";
					  

					        }
					        elseif ($row['room_id'] == 3) {
					        
					        	$roomName = "Queen Deluxe";
					        

					        }
					        elseif ($row['room_id'] == 4) {
					        	
					        	$roomName = "King Deluxe";
					        

					        }
					        elseif ($row['room_id'] == 5) {
					   
					        	 $roomName = "Suite Deluxe";
					        	
						    }
						    elseif ($row['room_id'] == 6) {
					        	
					        	$roomName = "Penthouse Deluxe";
					      
					        }
			

		?>

		<div class="bookingtables">

		<br>
		<h5 class="infolabel">Name: <?php echo $row['fname'];?> <?php echo $row['lname'];?></h5>
		<h5 class="infolabel">Check-in Date: <?php echo $row['check_in'];?></h5>
		<h5 class="infolabel">Check-out Date: <?php echo $row['check_out'];?></h5>
		<h5 class="infolabel">Room Type:  <?php echo $roomName;?></h5>
		<h5 class="infolabel">Total Bill:  <?php echo $row['room_charge'];?></h5>

	</div>	<br><br><br><br><br><br><br><br><br><br>

		<?php 
				}


						mysqli_free_result($result);

			}

			else{

							echo '<h4 class="user" style="margin-top: 50px; "><p style="text-align: center" ;> No Booking Orders Yet</p></h4>';

				}

		?>

</div>

</body>
</html>