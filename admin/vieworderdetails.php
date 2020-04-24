<!DOCTYPE html>
<html>
<head>
	<title>View state</title>
</head>
<body>
<h1 style="text-align: center;">STATES</h1>
<?php
include_once("../class/Orderdetail.php");
$obj=new Orderdetail();
include_once("../class/Product.php");
$obj1=new Product();
$oid=$_GET["Id"];
$rec=$obj->selectfromorderid($oid);
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Product name</td>
	<td>Product quantity</td>
	<td>Product totalprice</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$rec1=$obj1->selectproductfromid($result[2]);
		while($result1=mysqli_fetch_array($rec1)){
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result1[1]."</td>
			<td>".$result[3]."</td>
			<td>".$result[4]." Rs/-</td>
			<td>
			<button>EDIT</button>
			<button>DELETE</button>
			</td>
		</tr>";
		}
	}
	$data.="</table>";
	echo $data;
?>
</body>
<a href="vieworders.php">BACK</a>
</html>