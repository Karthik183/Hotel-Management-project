<?php
session_start();
if (!(isset($_SESSION['username']))) {
header ("Location: login.html");
}



$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";


$booking_id=$_POST["booking_id"];
$room_id=$_POST["room_id"];	
$user_id=$_SESSION["username"]; 

$checkout_date=$_POST["out_date"];
echo "<script>alert('$booking_id');</script>";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql="delete from booking where booking_id='$booking_id' and checkin_date>'2016-11-16'";

$result=mysqli_query($conn,$sql);
if($result)
{
	echo "<script>alert('cancelled');</script>";
	echo "YOUR BOOKING HAS BEEN CANCELLED";
}


?>