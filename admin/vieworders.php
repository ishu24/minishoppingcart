<!DOCTYPE html>
<html>
<head>
	<title>View state</title>
</head>
<body>
<h1 style="text-align: center;">STATES</h1>
<?php
include_once("../class/Order.php");
$obj=new Order();
$rec=$obj->select();
include_once("../class/User.php");
$obj1=new User();
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Username</td>
	<td>Order place date</td>
	<td>Order grand total</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$rec1=$obj1->selectuserfromid($result[1]);
		while($result1=mysqli_fetch_array($rec1)){
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result1[1]." ".$result1[2]."</td>
			<td>".$result[2]."</td>
			<td>".$result[3]." Rs/-</td>
			<td>
			<button>EDIT</button>
			<button>DELETE</button>
			<a href='vieworderdetails.php?Id=".$result[0]."'>Order details</a>
			</td>
		</tr>";
		}
	}
	$data.="</table>";
	echo $data;
?>
</body>
<a href="index.php">BACK</a>
</html>