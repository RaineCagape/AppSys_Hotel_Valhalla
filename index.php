<<<<<<< HEAD
<?php 
	
	include 'config.php';

	session_start();

	if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){

		header("location:login.php");

		exit;
	}

	$username = $_SESSION['username'];
=======
<?php

	// Initialize the session
	 require_once 'config.php';
	 session_start();
>>>>>>> 8ad4fd45cf3ba0c37123b5ccfc8f5c3e5940efc1

 	// If session variable is not set it will redirect to login page
  	 if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  	 header("location: login.php");
  
   	exit;
	 }

	 $username = $_SESSION['username'];

 		
?>


<html>
<head>
	<title>Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

	<div class="container">
<<<<<<< HEAD
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

=======


			<nav>
				<div class="header">	
					<div id="logo"><a href="index.html"><img src="images/logo2.png" style="height: 100px"/></a></div>

				</div>
			</nav>	
				
		<div class="row">
			<div class="col-lg-12">	
					<button type="button" class="booking" onclick="window.location.href='booking.php'"> <a href="booking.php" class="nav">Book a Room<br></a></button>
					<button type="button" class="rooms" onclick="window.location.href='room.html'"><a href="room.html" class="nav">Accomodations</a></button>
					<button type="button" class="log" onclick="window.location.href='logout.php'"><a href="logout.php" class="nav">Log Out</a></button>
>>>>>>> 8ad4fd45cf3ba0c37123b5ccfc8f5c3e5940efc1

				<div class="slideshow">
		 
		  				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				    
						    <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						      <li data-target="#myCarousel" data-slide-to="1"></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>
						    </ol>

						    
						    <div class="carousel-inner">
						      <div class="item active">
						        <img src="images/hotel13.jpg" alt="hotel13" style="width:100%;">
						      </div>

						      <div class="item">
						        <img src="images/hotel12.jpg" alt="hotel12" style="width:100%;">
						      </div>
						    
						      <div class="item">
						        <img src="images/hotel14.jpg" alt="hotel14" style="width:100%;">
						      </div>
						    </div>

						    
						    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
						      <span class="glyphicon glyphicon-chevron-left"></span>
						      <span class="sr-only">Previous</span>
						    </a>
						    <a class="right carousel-control" href="#myCarousel" data-slide="next">
						      <span class="glyphicon glyphicon-chevron-right"></span>
						      <span class="sr-only">Next</span>
						    </a>
				  	    </div>
					
					</div>

				</div>
		  </div>
					  	<div class="footer">
<<<<<<< HEAD
					  	
					  	<?php
					  	 	include 'footer.php';
					  	 ?>	
=======
					  		<div class="contactus">
					  			<h3>Contact Us</h3>
					  		</div>	

>>>>>>> 8ad4fd45cf3ba0c37123b5ccfc8f5c3e5940efc1

					  	</div>

		</div>	

	
</body>
</html>