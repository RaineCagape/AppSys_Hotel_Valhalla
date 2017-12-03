<?php
	session_start();


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


				<div class="header">	
					<div id="logo"><a href="index.html"><img src="images/logo2.png" style="height: 100px"/></a></div>
					
				</div>
				
		<div class="row">
			<div class="col-lg-12">	
					<button type="button" class="booking"> <a href="booking.html" class="nav">Book a Room<br></a></button>
					<button type="button" class="rooms"><a href="room.html" class="nav">Accomodations</a></button>

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
					  	<div class="footer"></div>

		</div>	

	
</body>
</html>