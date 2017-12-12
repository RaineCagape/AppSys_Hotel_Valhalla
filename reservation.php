<?php

	 require_once 'config.php';
    


	$userId= $message = $userName= $threadId="";

   
	

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $_SESSION['checkin_date'] = $_POST["dayStart"];
        $_SESSION['checkout_date'] = $_POST["dayEnd"];

         $date1 = date_create($_POST["dayStart"]);
        $date2 = date_create($_POST["dayEnd"]);

        if(strtotime($date1) < strtotime($date2)){

          echo "<label>Date Error</label>";

        }
        else{
            
            if ($stmt = mysqli_prepare($link,$sql)){

                    mysqli_stmt_bind_param($stmt,"iiss",$param_threadId,$param_userId,$param_message,$param_userName);

                    $param_threadId = $threadId;
                    $param_userId = $userId;
                    $param_message = $message;
                    $param_userName = $userName;
                    // $param_flag = $flag;


                    if(mysqli_stmt_execute($stmt)){
                    

                    
                     header("location: clientProfile.php");

                       
                    } 

                    else{
                            echo "Booking went wrong. Please try again later.";
                    }


                }

                mysqli_stmt_close($stmt);

                 // mysqli_close($link);
              }

      } //else
    }


 		
?>
