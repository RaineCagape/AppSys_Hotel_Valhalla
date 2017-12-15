<?php
// Include config file
require_once 'config.php';

// Define variables and initialize with empty values
$username= $password= $confirm_password= $fname= $lname= $email= "";
$username_err = $password_err= $confirm_password_err= $fname_err= $lname_err= $email_err= "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

   // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
       } 

    	else{
        // Prepare a select statement
        	$sql = "SELECT id FROM account WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                }

                 else{
                    
                    $username = trim($_POST["username"]);
                }
            }

             else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }



    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    //other data inputs to store in the database
    if(empty(trim($_POST["fname"]))){
        $fname_err ='Please enter your firstname.'; 
    } else{
        $fname= trim($_POST["fname"]);
    }

    if(empty(trim($_POST["lname"]))){
        $lname_err ='Please enter your lastname.'; 
    } else{
        $lname= trim($_POST["lname"]);
    }

    if(empty(trim($_POST["email"]))){
        $email_err ='Please enter your email.'; 
    }else{
        $email= trim($_POST["email"]);
    }


    // if(empty(trim($_POST["gender"]))){
    //     $gender_err ='Please click a gender.';
    // } else{
    //     $address= trim($_POST["gender"]);
    // }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($fname_err) && empty($lname_err) && empty($gender_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO account (username, password, fname, lname, email) VALUES (  ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, 'sssss', $param_username, $param_password, $param_fname, $param_lname,$param_email);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            // $param_gender = $gender;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                session_start();

                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $fname; 
                $_SESSION['lastname'] = $lname;
                $_SESSION['email'] = $email;
                $_SESSION['Warning'] = "";

                // Redirect to login page
                header("location: index.php");
            } 

            else{
                echo "Something went wrong. Please try again later.";
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
	<title>Sign Up For an Account | Hotel Valhalla</title>
	<link rel="icon" href="images/logo.png">
	<script type="text/javascript" src='scripts.js'> </script>
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

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
					<h1 class="topLabel">Register</h1>
					<h5 class="subLabel">To manage your bookings, register to create an online account. An easy platform to review pass stays, access to manage your current reservations.</h5>
				</div>		

				<div class="register">
					<form action="<?php echo htmlspecialchars ($_SERVER['PHP_SELF']); ?>" method="post">

						<h5 class="username">Username*</h5>
						<input type="text" name="username"  id="username" class="username" placeholder="username" value="<?php echo $username; ?>" data-toggle="popover" data-content="<?php echo $username_err;?>"/>

						<h5 class="pass">Password*</h5>
						<input type="password" name="password" id="password" class="password" placeholder="password" value="<?php echo $password; ?>" data-toggle="popover" data-content="<?php echo $password_err;?>" />
						
						<h5 class="confpass">Confirm Password*</h5>
						<input type="password" name="confirm_password" id="confirm_password" class="confirmpassword" placeholder="confirm password" value="<?php echo $confirm_password; ?>"   data-content="<?php echo $confirm_password_err;?>">

						<h5 class="fname">First Name*</h5>
						<input type="text" name="fname" class="firstnme" id="fname" placeholder="first name" value="<?php echo $fname; ?>"  data-toggle="popover" data-content="<?php echo $fname_err;?>" />

						<h5 class="lname">Last Name*</h5>
						<input type="text" name="lname" class="lastnme" id="lname" placeholder="last name" value="<?php echo $lname; ?>"  data-toggle="popover" data-content="<?php echo $lname_err;?>" />

						<h5 class="email">E-mail Address*</h5>
						<input type="text" name="email" class="emadd" id="email" placeholder="e-mail" value="<?php echo $email; ?>" pattern="^[A-Za-z0-9_]{1,15}$" autofocus required title="Should only contain alphanumeric characters and an underscore" data-toggle="popover" data-content="<?php echo $email_err;?>" />

						<input type="submit" value="Sign Up" class="submit"><br></a>

						<input type="button" value="Cancel" class="cancel">

					</form>	
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