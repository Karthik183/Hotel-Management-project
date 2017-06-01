<?php
$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";


session_start();
if (!(isset($_SESSION['username']))) {
header ("Location: login.php");
}


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<DOCTYPE html5>
<html>
<head>
<title>Booking Results</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<style>
body{
	font-family: 'Roboto', sans-serif;
	text-align: center;
	font-size: 20px;
	
}
table tr td:nth-child(1){
	text-align: right;
}
td{
	padding: 10px;
}
#sub{
	border: 1px solid grey;
	padding: 5px;
	margin: 0 70px 0 0;
}
</style>
</head>
<body>
<h5><?php echo 'Congrats '.$_SESSION["username"];?></h5>
<h1>Your room has been successfully booked</h1>
<a href="booking.php" >BOOK ANOTHER ROOM</a><br>
<a href="account.php">ACCOUNT</a><br>
<a href="logout.php">LOGOUT</a><br>

<?php
?>
</body>
</html>



