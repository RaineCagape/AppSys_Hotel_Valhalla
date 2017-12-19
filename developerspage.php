<?php
// Include config file
require_once 'config.php';
session_start();


?>

<html>
<head>
	<title>Log In | Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	 <script type="text/javascript">
        $(document).ready(function(){
   	   	$('[data-toggle="popover"]').popover('show');});
    </script>

</head>

<body>

	<div class="container">

		   <nav>
                <div class="header">    
                         <?php
                            include 'headernotin.php';
                         ?> 

                </div>
            </nav>      
                
        <div class="row">
            <div class="col-lg-12"> 
                 <?php
                            include 'headbuttonnotin.php';
                  ?> 


				<div class="contDate">
					<br>
					<h1 class="topLabel">THE DEVELOPERS</h1>
					<h5 class="subLabel">In partial fulfillment of the requirements on Applications System Development.</h5>
				</div>	
	

				<div class="login" style="font-size: 30px;">
					<h5 class="username" style="font-size:30px">Marnela Angela A. Regalado</h5>
					<h5 class="pass" style="font-size:30px">Reyna Elaine G. Cagape</h5>
					<h5 class="pass" style="font-size:30px"><br><br><br>Andrea Gail N. Balcom</h5>
				</div>	
<!-- 
				<img src="images/line.png" class="divide">
 -->
			<!-- 	<div class="reg">
						
				</div>	 -->	

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