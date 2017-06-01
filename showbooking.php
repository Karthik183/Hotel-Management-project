<?php
session_start();
if (!(isset($_SESSION['username']))) {
header ("Location: login.html");
}


$servername = "127.0.0.1";
$username = "karthik";
$password = "arji123";
$dbname = "dbms_project";


$hotel_id=$_POST["city"];
$checkin_date=$_POST["checkin_date"];
$checkout_date=$_POST["checkout_date"];
$date1=date_create($checkin_date);
$date2=date_create($checkout_date);
$interval=date_diff($date1,$date2);
if($date1>$date2)
{
	echo "<script>alert('check error');document.location = 'booking.php';</script>";

header("Location: booking.php");
}

$conn = mysqli_connect($servername, $username, $password, $dbname);

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
<h1>Rooms booking portal</h1>
<hr/>
<h5><?php echo 'Welcome '.$_SESSION["username"];?></h5>
<h5>results for dates <?php echo $checkin_date;?> to <?php echo $checkout_date.' in '.$hotel_id;?></h5>

<?php
$sql = "select * from room natural join room_type natural join hotel where hotel_id='$hotel_id' and room_id not in (select room_id from booking where ('$checkin_date' between CHECKIN_DATE and CHECKOUT_DATE) or('$checkout_date' between CHECKIN_DATE and CHECKOUT_DATE) or (CHECKIN_DATE>='$checkin_date' and CHECKOUT_DATE<='$checkout_date'))";
if($result = mysqli_query($conn,$sql)){
	if(mysqli_num_rows($result)>0){
		?>
		<table align="center" border="2">
		<thead>
		<tr>
		<th>City</th>
		<th>Hotel name</th>
		<th>Room type</th>
		<th>Room ID</th>
		<th>Room price(day)</th>
		<th>TOTAL COST</th>
		<th>Book now</th>
		
		</tr>
		</thead>
		<tbody>
		<?php
		while($row=mysqli_fetch_assoc($result)){
			?>
			<tr>
			<td><?php echo $row["HOTEL_ID"]?></td>
			<td><?php echo $row["NAME"]?></td>
			<td><?php echo $row["ROOM_TYPE"]?></td>
			<td><?php echo $row["ROOM_ID"]?></td>
			<td><?php echo $row["ROOM_PRICE"]?></td>
			<td><?php echo $interval->format('%a')*$row["ROOM_PRICE"]?></td>
			
				<td>
					<form action="bookRoom.php" method="post">
						<input type="hidden" name="hotel_id" value="<?php echo $row["HOTEL_ID"]?>">
						<input type="hidden" name="name" value="<?php echo $row["NAME"]?>">
						<input type="hidden" name="room_id" value="<?php echo $row["ROOM_ID"]?>">
						<input type="hidden" name="in_date" value="<?php echo $checkin_date;?>">
						<input type="hidden" name="out_date" value="<?php echo $checkout_date;?>">
						<input type="submit" style="border: 1px solid grey;margin: auto;background-color: black;color: white;border-radius: 2px;padding: 10px" value="BOOK">
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

</body>
</html>

