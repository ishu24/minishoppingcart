<!DOCTYPE html>
<html>
<head>
	<title>View state</title>
</head>
<body>
<h1 style="text-align: center;">STATES</h1>
<?php
include_once("../class/State.php");
$obj=new State();
$rec=$obj->select();
include_once("../class/Country.php");
$obj1=new Country();
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Country</td>
	<td>State</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$rec1=$obj1->selectcountryfromid($result[2]);
		while($result1=mysqli_fetch_array($rec1)){
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result1[1]."</td>
			<td>".$result[1]."</td>
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