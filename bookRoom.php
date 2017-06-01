<?php
session_start();
if (!(isset($_SESSION['username']))) {
header ("Location: login.html");
}



$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";


$hotel_id=$_POST["hotel_id"];
$room_id=$_POST["room_id"];	
$user_id=$_SESSION["username"]; 
$checkin_date=$_POST["in_date"];
$checkout_date=$_POST["out_date"];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="INSERT INTO booking(CUSTOMER_ID,HOTEL_ID,ROOM_ID,BOOKING_DATE,CHECKIN_DATE,CHECKOUT_DATE) VALUES('$user_id','$hotel_id','$room_id','2016-11-16','$checkin_date','$checkout_date')";
$result=mysqli_query($conn,$sql);
echo $checkin_date;
if($result){
	header('Location: sbooking.php');
	
}else{
	echo 'Not booked due to error ';
}

?>