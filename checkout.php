<?php
session_start();
if (!(isset($_SESSION['empname']))) {
header ("Location: login.html");
}



$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";


$booking_id=$_POST["booking_id"];
$room_id=$_POST["room_id"];	
$customer_id=$_POST["customer_id"]; 
$checkin_date=$_POST["checkin_date"];
$booking_date=$_POST["booking_date"];
$days=$_POST["days"];
$amount=$_POST["booking_cost"];

echo "<script>alert('$booking_id');</script>";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql="INSERT INTO `transactions` (`CUSTOMER_ID`, `ROOM_ID`, `CHECKIN_DATE`, `DAYS`, `AMOUNT`) VALUES ('$customer_id','$room_id','$checkin_date','$days','$amount')";
$sql1="DELETE FROM booking where booking_id='$booking_id'";

$result=mysqli_query($conn,$sql);
if($result)
{
	$result1=mysqli_query($conn,$sql1);
	if($result1){
	
	echo "<script>alert('cancelled');</script>";
	echo "CHECKED OUT";
	}
}