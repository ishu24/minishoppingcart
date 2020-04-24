<!DOCTYPE html>
<html>
<head>
	<title>View product</title>
</head>
<script type="text/javascript">
	function delete_id(id)
	{
		var r= confirm("Are you sure you want to delete?");
		
		if(r== true)
		{
			window.location.href='delete.php?tbl=product_detail&delete_id='+id;	
		}
		
	}
</script>
<body>
<h1 style="text-align: center;">PRODUCTS</h1>
<?php
include_once("../class/Product.php");
$obj=new Product();
$rec=$obj->select();
include_once("../class/Category.php");
$obj1=new Category();
	$i=1;
	$data="<table border='1'>
	<tr>
	<td>Sr.No</td>
	<td>Category</td>
	<td>Product</td>
	<td>Description</td>
	<td>Image</td>
	<td>Price on weight/measure</td>
	<td>Size</td>
	<td>Action</td>
	</tr>";
	while($result=mysqli_fetch_array($rec)){
		$rec1=$obj1->selectcategoryfromid($result[2]);
		while($result1=mysqli_fetch_array($rec1)){
		$data.="<tr>
			<td>".$i++."</td>
			<td>".$result1[1]."</td>
			<td>".$result[1]."</td>
			<td>".$result[3]."</td>
			<td><img src='".$result[4]."' height='100px' width='100px'></td>
			<td>".$result[5]."".$result[6]."</td>
			<td>".$result[7]."</td>
			<td>
			<a href='addproduct.php?Id=".$result[0]."'>EDIT</button>
			<a href='javascript:delete_id(".$result[0].")'>DELETE</a>
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