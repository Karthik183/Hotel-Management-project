<?php
session_start();
if(!isset($_SESSION["empname"])){
	header("Location: employee.html");
}
?>

<html>
<head>
<title>Sign-up | Hotel Management</title>
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
<a href="logout.php">LOGOUT</a><br>
<a href="ADDROOM.html">ADD ROOM</a>
<h1>BOOKINGS OF HOTEL</h1>
<?php
$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$staff_id=$_SESSION["empname"];

$sql = "select booking_id,customer_id,room_id,booking_date,checkin_date,datediff(checkout_date,checkin_date) as days,datediff(checkout_date,checkin_date)*room_price as booking_cost from booking NATURAL join room natural join room_type";
if($result = mysqli_query($conn,$sql)){
	if(mysqli_num_rows($result)>0){
		?>
		<table align="center" border="2">
		<thead>
		<tr>
		<th>Booking ID</th>
		<th>Room ID</th>
		<th>Customer name</th>
		<th>Booking date</th>
		<th>Start date</th>
		<th>Days</th>
		<th>Booking cost</th>
		<th>Check-out</th>
		</tr>
		</thead>
		<tbody>
		<?php
		while($row=mysqli_fetch_assoc($result)){
			?>
			
			<tr>
			<td><?php echo $row["booking_id"]?></td>
			<td><?php echo $row["room_id"]?></td>
			<td><?php echo $row["customer_id"]?></td>
			<td><?php echo $row["booking_date"]?></td>
			<td><?php echo $row["checkin_date"]?></td>
			<td><?php echo $row["days"]?></td>
			<td><?php echo $row["booking_cost"]?></td>
			
			<td>
				<form action="checkout.php" method="post">
				    <input type="hidden" name="booking_id" value="<?php echo $row["booking_id"]?>">
					<input type="hidden" name="room_id" value="<?php echo $row["room_id"]?>"> 
					<input type="hidden" name="customer_id" value="<?php echo $row["customer_id"]?>">
					<input type="hidden" name="booking_date" value="<?php echo $row["booking_date"]?>">
				    <input type="hidden" name="checkin_date" value="<?php echo $row["checkin_date"]?>">
					<input type="hidden" name="days" value="<?php echo $row["days"]?>">
					<input type="hidden" name="booking_cost" value="<?php echo $row["booking_cost"]?>">
					<input type="submit" style="border: 1px solid grey;margin: auto;background-color: black;color: white;border-radius: 2px;padding: 10px" value="Check out" name="submit">
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
<hr/>
</body>
</html>