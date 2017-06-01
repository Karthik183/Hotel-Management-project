<?php
$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";

$user_id=$_POST["user_id"];
$password1=$_POST["password"];

session_start();
if ((isset($_SESSION['username']))) {
header ("Location: booking.php");
}
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "select * from customer_details where customer_id='$user_id' and password='$password1'";

if ($res=mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($res)==1){
		echo "login successful";
		$_SESSION["username"]=$user_id;
		header('Location: booking.php');
	
		
	}
	else{
		echo " wrong credentials";
		header('Location: login.html');
		}
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>