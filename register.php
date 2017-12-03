<html>
<head>
	<title>Sign Up For an Account | Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<link rel="stylesheet" href="css/register.css">
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
					<button type="button" class="booking"> <a href="booking.html" class="nav">Book a Room<br></a></button>
					<button type="button" class="rooms"><a href="room.html" class="nav">Accomodations</a></button>
					<button type="button" class="log"><a href="login.html" class="nav">Log In</a></button>

				<div class="contDate">
					<h1 class="topLabel">Register</h1>
					<h5 class="subLabel">To manage your bookings, register to create an online account. An easy platform to review pass stays, access to manage your current reservations.</h5>
				</div>		

				<div class="register">
					<form>
						<h5 class="username">Username*</h5>
						<input type="text" name="username" class="username" placeholder="username" required/>

						<h5 class="pass">Password*</h5>
						<input type="password" name="password" class="password" placeholder="password" required/>
						
						<h5 class="confpass">Confirm Password*</h5>
						<input type="password" name="confpassword" class="confirmpassword" placeholder="confirm password" required/>

						<h5 class="fname">First Name*</h5>
						<input type="text" name="firstname" class="firstnme" placeholder="first name" required/>

						<h5 class="lname">Last Name*</h5>
						<input type="text" name="lastname" class="lastnme" placeholder="last name" required/>

						<h5 class="email">E-mail Address*</h5>
						<input type="text" name="emailadd" class="emadd" placeholder="e-mail" required/>

						<h5 class="gender">Gender*</h5>

						<div  class="containgender">
								<input type="radio" class="gendercont" name="gender" value="Male" checked="checked" required/><span class="gendlabel">Male</span>
			    				<input type="radio" class="gendercont" name="gender" value="Female" required /><span class="gendlabel">Female</span>
	    				</div> 

						<input type="submit" value="Sign Up" class="submit">

						<input type="button" value="Cancel" class="cancel">

					</form>	
				</div>	
				
				</div>
			</div>

				<div class="footer">
					  		
					  	<?php include('footer.hmtl') ?>
				</div>		
	</div>

	
</body>
</html>