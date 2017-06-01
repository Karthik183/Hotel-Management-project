<?php
session_start();
if (!(isset($_SESSION['username']))) {
header ("Location: login.html");
}
?>


<!DOCTYPE HTML>

<html>
<head>
<title>WELCOME TO HOMELY HOTELS </title>
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
<a href="account.php">ACCOUNT</a>
<h5><?php  echo 'Welcome '.$_SESSION["username"];?></h5>
<h1>BOOK A ROOM </h1>
<form action="showbooking.php" method="post">
<label>SELECT YOUR NEEDS<br></label><hr/>
<table align="center" border="2">
<tbody>
<tr>
<td> SELECT CITY:</td><td><select name="city">
   <option value="select">SELECT</option>
	<option value="WARANGAL">WARANGAL</option>
    <option value="HYDERABAD">HYDERABAD</option>
    <option value="ROURKELA" >ROURKELA</option>
    <option value="BHUBANESWAR">BHUBANESWAR </option>
  </select>
  <br><br>
  </select>
  </td>
</tr>

<tr>
<td>CHECKIN DATE:</td><td><input type="date" name="checkin_date" id="date1" min="2016-11-16" required></td>
</tr>
<tr>
<td>CHECKOUT DATE:</td><td><input type="date" name="checkout_date" id="date2" min="2016-11-16" required></td>
</tr>
</tr>
<br>




<tr>
<td colspan="2"><button type="submit" id="sub" >SUBMIT</button></td>
</tr>
</tbody>
</table>
</form>
<hr/>
</body>
</html>