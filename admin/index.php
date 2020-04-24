<!DOCTYPE html>
<html>
<head>
	<title>Shooping cart admin side</title>
</head>
<body>
	<h1 style="font-size: 50px; text-align: center;">Shopping cart -Welcome-
	<?php
	session_start();
	echo $_SESSION["uname"];
	?>

	</h1>
	<p style="text-align: right;"><a href="../logout.php">Log out</a></p>
	<p style="text-align: left;">
		<a href="addcountry.php">Add country</a>
		<br>
		<a href="viewcountry.php">View country</a>
		<br>
		<a href="addstate.php">Add state</a>
		<br>
		<a href="viewstate.php">View state</a>
		<br>
		<a href="addcategory.php">Add category</a>
		<br>
		<a href="viewcategory.php">View category</a>
		<br>
		<a href="addproduct.php">Add product</a>
		<br>
		<a href="viewproduct.php">View product</a>
		<br>
		<a href="addstock.php">Add stock</a>
		<br>
		<a href="viewstock.php">View stock</a>
		<br>
		<a href="vieworders.php">View Order/Orderdetails</a>
		<br>
	</p>
</body>
</html>