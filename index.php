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

					<div class="article1">
				  	   		<h1 class="labelart"> Vikings- A Feast From the Sea</h1>
				  	    	<img src="images/vikings.jpg" class="viking">
				  	    	<img src="images/vikings-5.jpg" class="viking2">
				  	    	
				  	    	<div class="article2">
				  	    		<h5 class="vikinginfo">
				  	    		In partnership with Vikings PH, Hotel Valhalla brings to you the feast from the nine realms and across the seven seas.</br></br> 

								Our dining hall consists of food that can satisfy even the gods themselves. We’ve got pizza’s from Italy, sushi from Japan, dim sum from china, cakes from France, salsas from Mexico, and even the very own delicacies of the Pearl of the Orient Seas. Surely, you will satisfy your inner cravings, and find every food your mind can imagine- all in the comfort of the hotel premises. No need to drive to the nearest mall and locate the buffet, it’s all here in Hotel Valhalla, waiting for you!</br></br> 

								Now, unleash your inner Viking, and feast like you are about to face Ragnarok!</h5>


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