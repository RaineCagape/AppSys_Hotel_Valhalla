<?php

	require_once 'config.php';
	session_start();

	if($_SESSION['username']!='admin'){

		header("location: index.php");

	}

 ?>

<html>
<head>
	<title>Admin Page | Hotel Valhalla</title>
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
		

						<div class="profilepic">
						<img src="images/user.png" class="dp"> 
						</div>

						<h2 class="fullname">ADMIN NAME</h2>

						<?php
							include 'bookingtable.php';
						?>

	
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