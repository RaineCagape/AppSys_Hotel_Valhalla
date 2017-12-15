<?php 
	
	include 'config.php';

	session_start();

	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}

	

	$fname = $_SESSION['firstname'];
	$lname = $_SESSION['lastname'];
	$id = $_SESSION['id'];
	$completeName = $fname.' '.$lname;


?>

<html>
<head>
	<title>Your Profile | Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<script type="text/javascript" src='css/scrollbar.js'> </script>
	<link rel="stylesheet" href="css/client.css">
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
				
				<?php

				if(isset($_SESSION['Warning'])||!empty($_SESSION['Warning'])){ 

					$warning = "<b>Note: </b>You Can Only Apply for Reservation Once";

				?>
				<script type="text/javascript">
	 			  window.setTimeout(function() {
	  				  $(".alert").fadeTo(500, 0).slideUp(500, function(){
	       			  $(this).remove();  });}, 5000);
				</script>

				<div class="alert alert-danger" data-dismiss="alert" id="alert" role="alert" style="width:1000px; font-size: 13px; margin-top: 70px; margin-left: 270px; padding-bottom: 10px;"><?php echo $warning; ?></div>


				<?php

		
				}
					 unset($_SESSION['Warning']);
				?>
					


						<div class="profilepic">
						<img src="images/user.png" class="dp"> 

						<h2 class="fullname"><?php echo $completeName; ?></h2>
						<div class="otherinfo">
					
					<?php 

						$sql = " SELECT reserve_name, check_in, check_out, room_id, room_rate  FROM reservation WHERE clientId = ('$id') ";

						$result = mysqli_query($link,$sql);

						if(mysqli_num_rows($result)>0){


							while($row =mysqli_fetch_array($result)){

							$reservation =$row['reserve_name'];
							$check_in =$row['check_in'];
							$check_out = $row['check_out']; 
							$room_id = $row['room_id'];
							$room_rate = $row['room_rate'];

							if($room_id == 1){

					        	 $roomName = "Modgud's Gjoll Solo Deluxe";
					        }
					        elseif ($room_id == 2) {
					        	
					        	$roomName = "Freyr and Freya's Twin Double Bed Deluxe";

					        }
					        elseif ($room_id == 3) {
					        
					        	$roomName = "Frigg's Throne and Boudoir";

					        }
					        elseif ($room_id == 4) {
					        	
					        	$roomName = "Odin's Throne and Bedchamber";

					        }
					        elseif ($room_id == 5) {
					   
					        	 $roomName = "Idun's Garden and Suite";
						    }
						    elseif ($room_id == 6) {
					        	
					        	$roomName = "Heimdall's Rainbow Bridge Penthouse";
					        }


					?>
				
						
							<h4 class="user">Reservation Name: <b style="font-size: 20px;"><?php echo strtoupper($reservation); ?><b></h4>
							<h4 class="user">Check-in Date: <?php echo $check_in;  ?> </h4>
							<h4 class="user">Check-out Date: <?php echo $check_out; ?></h4>
							<h4 class="user">Room Type: <?php echo  $roomName; ?></h4>
							<h4 class="user">Rate: ₱ <?php echo  $room_rate; ?>.00</h4> 
						
					<?php 

							}
							mysqli_free_result($result);


						}

						 else{

							echo '<h4 class="user" style="margin-top: 50px; "><p style="text-align: center" ;>You Have No Transaction Yet</p></h4>';

						}

					?>

						</div>		

							<h2 class=infolabel>Hotel Valhalla Policies</h2>
							<h5 class="warning">This company had set policies to protect both your and our interests. We advise you to take a minute of your time and read them carefully.</h4>


					<div class="scrollbar" id="style-2">
						<div class="policies">
							<div class="privacy">
								<h3 class="policylabel">Privacy Policy</h3>
								<h5 class="policyinfo">Hotel Valhalla respects the privacy of all our customers and business partners, and treats all personal information as confidential.  We pledge to fully comply with the requirements of the Personal Data (Privacy) Ordinance of the Philippines and internationally recognized standards of personal data privacy protection</h5>

								<h5 class="policyinfolabel">Our Commitment to Protect Personal Data Privacy</h5>

								<h5 class="policyinfo">This Personal Data Privacy Policy applies to personal data and information regarding guests and other individuals with whom we do business with and to the management of that data and information in any form, whether electronic or written. </br></br> This Policy gives effect to our commitment and dedication to protect your personal information.</h5>

								<h5 class="policyinfolabel">Collection of Personal Information</h5>

								<h5 class="policyinfo">The term “personal data” in this Policy refers to personal information which we, in the process of providing you with a particular and excellent service, may ask you to voluntarily supply to us.  Personal data may be collected as part of but not limited to:</br></br>
 
								(i)   Fulfilling reservations or requests for information or services,</br>
								(ii)  Facilitating communications.
 
								</h5>

								<h5 class="policyinfolabel">Types of Personal Information We Collect</h5>

								<h5 class="policyinfo">
								The types of personal data that we collect may include:<br></br>
								      Name, username, check-in date, check-out date, contact details (limited to email address, profile or password.</h5>

								<h5 class="policyinfolabel">How We Use Personal Information</h5>

								<h5 class="policyinfo">We may use and disclose relevant portions of your personal data and information in order to:</br></br>
									Provide, manage and administer our services, provide you with customer service and respond to your requests, enable us to operate our business efficiently and sustainably, provide for the safety and security of staff, guests and other visitors.</h5>


								<h5 class="policyinfolabel">Third-party disclosure</h5>

								<h5 class="policyinfo">We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable Information.</h5>

								<h5 class="policyinfolabel">Direct Marketing</h5>

								<h5 class="policyinfo">We will not use your personal data for direct marketing or transfer your personal data and information (whether within or outside the Philippines) to any third parties for direct marketing purpose without obtaining your consent.</h5>

								<h5 class="policyinfolabel">Processing of Personal Information</h5>

								<h5 class="policyinfo">Whenever your personal data is transferred within Hotel Valhalla, your personal data will be processed in accordance with the terms and conditions of this Policy.</h5>

								<h5 class="policyinfolabel">Disclosure of Your Personal Information</h5>

								<h5 class="policyinfo">From time to time, we may disclose and transfer your personal data and information.  The recipients of any such data are under obligation to protect your personal information.</br></br>
 
								We reserve the right to disclose any personal data or information to comply with the law, or accounting and tax rules and regulations, or to protect or defend our rights or properties.</br></br>
								 
								We also reserve the right to use any information in emergency situations and informing your immediate family members of the situation.</br></br>
								 
								The personal data which we collect will not be sold to any third party at any time.</h5>

								<h5 class="policyinfolabel">Changes to the Policy</h5>

								<h5 class="policyinfo">Hotel Valhalla reserves full rights to amend or update this Policy unilaterally from time to time as it sees fit. Any changes to this Policy will be posted to our website so that you are always informed of the way we collect and use your personal data.  Updated versions of our Policy will include the date of the version at the end of this Policy so that you are able to check when the Policy was last emended.</br></br>
 
								Any changes to our Policy will become effective upon posting of the revised Policy on the website. Use of the website following such changes constitutes your acceptance of the revised Policy then in effect.
								</h5>

							</div>	

							<div class="payment">
								<h3 class="policylabel">Payment Method and Booking Process</h3>
								<h5 class="policyinfolabel">Payment</h5>
								<h5 class="policyinfo">All reservations and registration must be guaranteed with a valid major credit card.  We accept Visa, Master Card, American Express, and Discover Card.  Pursuant to credit card agreements, credit cards are not valid unless signed by the cardholder.  Credit cards must be signed.  Cash (USD) payment is welcomed with a signed and pre-authorized credit card.  All guests are required to present a valid major credit card and government issued photo identification even if guests are planning on paying in cash upon check-out.  Checks and foreign currency not accepted.</h5>
 
								<h5 class="policyinfolabel">Checks and Check Caching</h5>
								<h5 class="policyinfo">We do not accept checks.  We do not provide check cashing services.</h5>
								 
								<h5 class="policyinfolabel">Deposits and Guarantees</h5>
								<h5 class="policyinfo">There is no deposit required to make an individual room reservation.  However, a major credit card is required at the time of booking to guarantee the room and secure the reservation period.</h5>

								<h5 class="policyinfolabel">---</h5>
								<h5 class="policyinfolabel">Booking Process</h5>
								<h5 class="policyinfolabel">Guaranteed Reservations</h5>
								<h5 class="policyinfo">All reservations must be guaranteed with a valid major credit card.  Guests must be 18 years and older.  We accept Visa, Master Card, American Express, and Discover Card.  We do not charge your credit card at the time you make your reservations.  Your credit card guarantees your reservations. Please make sure to receive a reservation confirmation number when you make a reservation. Reservations must be cancelled Forty-eight (48 hours), hotel time, prior to your arrival date, in order to avoid a one (1) room night, plus tax cancellation fee.  Reservations will be held until 11:00 a.m. the morning following your scheduled arrival date.  If you have not checked in by that time, a NO-SHOW charge of one room night, plus tax will be charged to your credit card and the balance of your reservations will be cancelled.  Hotel Valhalla is not responsible for weather conditions, personal emergencies, or schedule changes.</h5>

								<h5 class="policyinfolabel">Check-in Time</h5>
								<h5 class="policyinfo">4:00 p.m. </h5> 
								 
								<h5 class="policyinfolabel">Early Check-in/Pre-Booking</h5>
								<h5 class="policyinfo">Early check-in is offered based on availability.  If you require a guaranteed check-in for arrival prior to 4 p.m. then Pre-Booking and payment may be required.  Please contact Front Desk staff directly to make reservations and complete a credit card authorization form prior to your arrival (406) 547-8888.</h5>

								<h5 class="policyinfolabel">Check-in Requirements</h5>
								<h5 class="policyinfo">Guests must be at least 18 years of age to check in at Hotel Valhalla.  In the interests of security and to prevent fraud, guests are required to confirm their identity by providing their valid government issued photo identification (State driver’s license, passport, etc.) at check-in.  A valid, signed, and pre-approved credit card in the name of the guest registration is also required.  It is your responsibility to fully understand the manner in which your bank processes pre-authorizations and charges to your credit/debit card.  Some banks hold pending authorizations for up to 30 business days.</h5>
								 
								<h5 class="policyinfolabel">Pre-Authorization at Check-in</h5>
								<h5 class="policyinfo">We have required pre-authorized of credit cards/debit cards at check-in since 2007.  A pre-authorization is a temporary hold of a specific amount of your available credit limit balance placed on your credit/debit card for the full amount of your intended stay, plus tax.  All credit/debit cards are pre-authorized at check-in.  Pre-authorization is not a charge to your account, it is a hold on those funds.  Once your actual charge is posted at check-out it can take anywhere from 24 hours to 30 days for the original pre-authorization to be removed by your bank.  Generally, most banks release the hold within 3-5 days.  It is your responsibility to be aware of how your bank handles all of your transactions, including pre-authorizations.  We are unable to remove pre-authorizations directly through our hotel.</h5>
								 
								<h5 class="policyinfolabel">Guest Registration</h5>
								<h5 class="policyinfo">We require valid contact information from the guest making the reservations including first and last name, address, phone number, and signature.  The names of all guests occupying the room must be registered (ARM 37.111.130).  Information regarding your license plate/car description is also gathered at check-in for security.</h5>
								 
								<h5 class="policyinfolabel">Check-out Time  </h5>
								<h5 class="policyinfo">Room rental period expires at 11:00 a.m.  Additional day charge, plus tax may apply for late checkout.</h5>
								 
								<h5 class="policyinfolabel">Check-Out Procedure</h5>
								<h5 class="policyinfo">Check-out time is 11 a.m.  Please check-out with Front Desk so that housekeeping may begin cleaning your room as soon as possible.  If you require a later check-out, please contact Front Desk prior to the day of your departure and we will do our best to accommodate your request.  A charge may apply for late check-out.</h5>

								<h5 class="policyinfolabel">Early Departure</h5>
								<h5 class="policyinfo">Guests who check out of the hotel after 11:00 a.m. and prior to their scheduled departure date are subject to an early departure fee of one night, plus tax.</h5>



							</div>

							<div class="cancel">
								<h3 class="policylabel">Policy on Cancelled Bookings</h3>
								<h5 class="policyinfolabel">Cancellation</h5>
								<h5 class="policyinfo">Hotel Valhalla is not responsible for weather conditions, personal emergencies, or schedule changes.  Reservations must be cancelled forty-eight (48 hours) hotel time, prior to your arrival date, in order to avoid a one (1) night full room cancellation fee.  If reservations are cancelled less than 48 hours before the arrival date, your credit card may be charged the full room charge plus taxes. If you are staying more than one (1) night, only the first night and taxes will be charged.  If you cancel any reservation, you must obtain and save the cancellation number for your records.</h5>

							</div>	
						</div>	
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