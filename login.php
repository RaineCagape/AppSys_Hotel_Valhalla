<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username = $password = $fname =$lname= "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username,password,fname,lname FROM account WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username,$hashed_password,$fname,$lname);
                   
				   if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
							session_start();

                            $_SESSION['username'] = $username;
                            $_SESSION['firstname'] = $fname;
                            $_SESSION['lastname'] = $lname;

                            header("location: index.php");
                        } 	else{
                            // Display an error message if password is not valid
						$password_err = 'Invalid Password.';
                        }
                    }
                } 	else{
                    // Display an error message if username doesn't exist
					$username_err = 'Username not Found.';
					}
            }		 else{
				echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
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

				<div class="header">	
					<div id="logo"><a href="greetingpage.html"><img src="images/logo2.png" style="height: 100px"/></a></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">	
					<button type="button" class="booking" onclick="window.location.href='booking.php'"> <a href="booking.php" class="nav">Book a Room<br></a></button>
					<button type="button" class="rooms" onclick="window.location.href='room.html'"><a href="room.html" class="nav">Accomodations</a></button>
					<button type="button" class="log" onclick="window.location.href='login.php'"><a href="login.php" class="nav">Log In</a></button>

				<div class="contDate">
					<h1 class="topLabel">LOG IN</h1>
					<h5 class="subLabel">To manage your bookings, register to create an online account. An easy platform to review pass stays, access to manage your current reservations.</h5>
				</div>	
	

				<div class="login">
					<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post">>
						<h5 class="username">Username*</h5>
						<input type="text" name="username" value="<?php echo $username;?>"  class="username" placeholder="username" data-toggle="popover" data-placement="left" data-content="<?php echo $username_err;?>">

						<h5 class="pass">Password*</h5>
						<input type="password" name="password" value="<?php echo $password;?>" class="password" placeholder="password" data-toggle="popover" data-placement="left" data-content="<?php echo $password_err;?>">
						
						<input type="submit" value="Log in" class="submit">
					</form>	
				</div>	

				<img src="images/line.png" class="divide">

				<div class="reg">
					<h3 class="toregister">Don't have an account? Sign up now!</h3>
					<button type="button" class="register" onclick="window.location.href='register.php'"> <a href="register.php" class="nav">Sign Up<br></a></button>	
				</div>		

				</div>
			</div>

				<div class="footer"></div>			
	</div>

	
</body>
</html>