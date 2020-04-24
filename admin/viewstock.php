<!DOCTYPE html>
<html>
<head>
	<title>View stock</title>
</head>
<body>
<h1 style="text-align: center;">STOCKS</h1>
<?php
include_once("../class/Product.php");
$obj1=new Product();
include_once("../class/Stock.php");
$obj=new Stock();
$rec=$obj->select();
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Product</td>
	<td>product price</td>
	<td>Stock_in Date</td>
	<td>Stock IN</td>
	<td>Stock OUT</td>
	<td>Pending stock</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$rec1=$obj1->selectproductfromid($result[1]);
		while($result1=mysqli_fetch_array($rec1)){
			$pstock=$result[3]-$result[4];
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result1[1]."</td>
			<td>".$result[5]." Rs/".$result1[5]." ".$result1[6]."</td>
			<td>".$result[2]."</td>
			<td>".$result[3]."</td>
			<td>".$result[4]."</td>
			<td>".$pstock."</td>
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
<a href="index.php">BACK</a>
</html>