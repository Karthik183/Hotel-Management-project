<?php

session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "karthik183";
$dbname = "dbms_project";
$user_id=$_POST["user_id"];
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$address=$_POST["address"];
$district=$_POST["district"];
$postcode=$_POST["postcode"];
$state=$_POST["state"];
$phone_no=$_POST["phone_no"];
$email_address=$_POST["email_address"];
$password1=$_POST["password"];
 


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO customer_details values('$user_id','$first_name','$last_name','$address','$district','$postcode','$state','$phone_no','$email_address','$password1')";

if (mysqli_query($conn, $sql)) {
    echo "Registered successfully";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
<body>
<br> <br>
<a href="login.html">LOGIN </a>
</body>
</html>
