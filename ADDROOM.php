<?php

session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "karthik183";
$dbname = "dbms_project";
$room_id=$_POST["room_id"];
$room_type=$_POST["room_type"];
$room_description=$_POST["room_description"];

 


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "SELECT `DISTRICT` FROM `employee` WHERE STAFF_ID='".$_SESSION['empname']."'";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result1)) {
        $city=$row['DISTRICT'];
    }
}
$sql = "INSERT INTO room values('$room_id','$room_type','$room_description','$city')";

if (mysqli_query($conn, $sql)) {
    echo "Registered successfully";
	
} else {
    echo "This room already exists";
}

mysqli_close($conn);
?>
<!DOCTYPE HTML>
<html>
<body>
<br> <br>
<a href="hotelbookings.php">GO BACK</a>
</body>
</html>
