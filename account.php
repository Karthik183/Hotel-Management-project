<?php
session_start();
if (!(isset($_SESSION['username']))) {
header ("Location: login.php");
}



$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";




$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$cust_id=$_SESSION["username"];
?>
<DOCTYPE html5>
<html>
<head>
<title>Your booking History</title>
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
<h1>BOOKING HISTORY</h1>
<hr>
<h4>Booking history of Mr. <?php echo $cust_id;?></h4>
<?php
$sql = "select * from booking where customer_id='$cust_id'";
if($result = mysqli_query($conn,$sql)){
	if(mysqli_num_rows($result)>0){
		?>
		<table align="center" border="2">
		<thead>
		<tr>
		<th>Booking ID</th>
		<th>CITY</th>
		<th>Room ID</th>
		<th>Booking date</th>
		<th>Checkin date</th>
		<th>Checkout date</th>
		</tr>
		</thead>
		<tbody>
		<?php
		while($row=mysqli_fetch_assoc($result)){
			?>
			
			<tr>
			<td><?php echo $row["BOOKING_ID"]?></td>
			<td><?php echo $row["HOTEL_ID"]?></td>
			<td><?php echo $row["ROOM_ID"]?></td>
			<td><?php echo $row["BOOKING_DATE"]?></td>
			<td><?php echo $row["CHECKIN_DATE"]?></td>
			<td><?php echo $row["CHECKOUT_DATE"]?></td>
			
			
			<td>
				<form action="cbooking.php" method="post">
					<input type="hidden" name="booking_id" value="<?php echo $row["BOOKING_ID"]?>">
					<input type="hidden" name="hotel_id" value="<?php echo $row["HOTEL_ID"]?>">
					<input type="hidden" name="room_id" value="<?php echo $row["ROOM_ID"]?>">
					<input type="hidden" name="b_date" value="<?php echo $booking_date?>">
				
					<input type="hidden" name="out_date" value="<?php echo $checkout_date;?>">
					<input type="submit" style="border: 1px solid grey;margin: auto;background-color: black;color: white;border-radius: 2px;padding: 10px" value="CANCELBOOKING" name="submit">
				</form>
			</td>
			</tr>
			<?php
		}
		?>
		</tbody>
		</table>
		<?php
	}
	else{
		?><h4><?php echo 'no rows fetched';?></h4><?php
	}
}

 else{
	echo 'Querry is wrong';
}

?>
<a href="logout.php">LOGOUT</a><br>
<a href="booking.php" >BOOK ANOTHER ROOM</a><br>
</body>
</html>

