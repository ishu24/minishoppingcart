<!DOCTYPE html>
<html>
<head>
	<title>View country</title>
</head>
<body>
<h1 style="text-align: center;">COUNTRIES</h1>
<?php
include_once("../class/Country.php");
$obj=new Country();
$rec=$obj->select();
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Country</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result[1]."</td>
			<td>
			<button>EDIT</button>
			<button>DELETE</button>
			</td>
		</tr>";
	}
	$data.="</table>";
	echo $data;
?>
<a href="index.php">BACK</a>
</body>
</html>