<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
$con = mysqli_connect("localhost", "root", "");

if(!$con){
	die("ERROR" . mysqli_connect_error());
}

$sql = "CREATE DATABASE dbhotel";
if(mysqli_query($con, $sql)){
	
	include_once 'config.php';
 }
 

mysqli_close($con);
?>	
</body>
</html>
