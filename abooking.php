
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
<h1>BOOK A ROOM </h1>
<form action="booking.php" method="post">
<label>SELECT YOUR NEEDS<br></label><hr/>
<table align="center" border="2">
<tbody>

<tr>
<td>CHECKIN DATE:</td><td><input type="date" name="checkin_date" required></td>
</tr>


</tbody>
</table>
</form>
<hr/>
<a href="account.php">ACCOUNT</a><br>
<a href="logout.php">LOGOUT</a><br>

</body>
</html