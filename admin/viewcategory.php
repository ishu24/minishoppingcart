<!DOCTYPE html>
<html>
<head>
	<title>View category</title>
</head>
<body>
<h1 style="text-align: center;">CATEGORIOES</h1>
<?php
include_once("../class/Category.php");
$obj=new Category();
$rec=$obj->select();
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Category</td>
	<td>Description</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result[1]."</td>
			<td>".$result[2]."</td>
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