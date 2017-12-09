<?php
	session_start();
?>

<html>
<head>
	<title>Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<link rel="stylesheet" href="css/room.css">
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

		  <div class="room">
				<div class="solo">
					<h2 class="roomfonts">Modgud's Gjoll Solo Deluxe</h2>
					<img src="images/hotel16.png" class="beds">
					<h5 class="roomdescript">Hotel Valhalla's solo deluxe bedroom shows you the comfort fit for a viking traveling alone. Relish in the goddess Modgud's mysterious riiver Gjoll, the river that separates the living from the dead. Up for some alone-time adventure? This room will surely make your entire Hotel Valhalla stay unforgettable.</h5>

					<ul class="details">
						  <li>Room Size: 40 sq. m.</li>
						  <li>Bed Size: 38" x 75"</li>
						  <li>Rate: Php 2,500.00/day </li>
						  <li>Room Number: 1 </li>
					</ul>

				</div>

				<div class="twin">
					<h2 class="roomfonts2">Freyr and Freya's Twin Double Bed Deluxe</h2>
					<img src="images/hotel8.png" class="beds2">
					<h5 class="roomdescript2">Having a travel buddy with you makes an entire stay more fun and charming, so here at </br> Hotel Valhalla, we have an exiting room just for you and your buddy. With the vanir twins </br> Freyr and Freya's twin double bed deluxe, you and your companion will have an </br> experience of a lifetime. </h5>

					<ul class="details2">
						  <li>Room Size: 50 sq. m.</li>
						  <li>Bed Size: 38" x 75"</li>
						  <li>Rate: Php 3,500.00/day </li>
						  <li>Room Number: 2 </li>
					</ul>
				</div>

				<div class="queen">
					<h2 class="roomfonts">Frigg's Throne and Boudoir</h2>
					<img src="images/hotel15.png" class="beds">
					<h5 class="roomdescript">Experience the regality of the Asgardian goddess Frigg with this plush and luxurious queen sized bed under you. Covered with exquisite linen and fur, you would surely experience</br> what it is like to be the queen of the nine worlds.</h5>

					<ul class="details">
						  <li>Room Size: 70 sq. m.</li>
						  <li>Bed Size: 60" x 80"</li>
						  <li>Rate: Php 8,499.00/day </li>
						  <li>Room Number: 3 </li>
					</ul>
				</div>

				<div class="king">
					<h2 class="roomfonts2">Odin's Throne and Bedchamber</h2>
					<img src="images/hotel7.png" class="beds2">
					<h5 class="roomdescript2">Want to experience how it feels like to be the king of Asgard? Here in Hotel Valhalla, you </br> can do just that. With a luxurious king sized bed fit only for the All-Father, we assure you </br> that your trip would rival a trip to Asgard itself.</h5>

					<ul class="details2">
						  <li>Room Size: 90 sq. m.</li>
						  <li>Bed Size: 38" x 75"</li>
						  <li>Rate: Php 9,399.00/day </li>
						  <li>Room Number: 4 </li>
					</ul>
				</div>

				<div class="suite">
					<h2 class="roomfonts">Idun's Garden and Suite</h2>
					<img src="images/hotel21.png" class="beds">
					<h5 class="roomdescript">What more to relax and spend your stay with Hotel Valhalla than having your very own kitchen and entertainment room? If you thirst to experience the ultimate suite room in the rooms, then Idun's garden filled with her golden apples is for you. Elegant while aesthetically rustic, this suite will be the envy of Einherji and gods alike.</h5>

					<ul class="details">
						  <li>Room Size: 150 sq. m.</li>
						  <li>Bed Size: 60" x 90"</li>
						  <li>Rate: Php 15,000.00/day </li>
						  <li>Room Number: 5 </li>
					</ul>
				</div>

				<div class="penthouse">
					<h2 class="roomfonts2">Heimdall's Rainbow Bridge Penthouse</h2>
					<img src="images/hotel23.png" class="beds2">
					<h5 class="roomdescript2">Ah, the ultimate Hotel Valhalla Experience, Heimdall's Rainbow Bridge Penthouse. Watch </br> over the nine realms with the highest vantage point and the best of view. Just get </br>Gjallarhorn ready just in case Ragnarok peeks around the corner.</h5>

					<ul class="details2">
						  <li>Room Size: 160 sq. m.</li>
						  <li>Bed Size: 65" x 90"</li>
						  <li>Rate: Php 16,000.00/day </li>
						  <li>Room Number: 6 </li>
					</ul>
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