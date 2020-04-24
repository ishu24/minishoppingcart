<?php
$id="";
if(isset($_GET["tbl"])){
	$tb=$_GET["tbl"];
}
if(isset($_GET["delete_id"]))
{
	$id=$_GET["delete_id"];
	if($tb=="product_detail")
	{
		include_once("../class/Product.php");
		$obj=new Product();
		$obj->set_Product_id($id);
		$obj->delete($obj);	
		echo "<script type='text/javascript'>location.href = 'viewproduct.php'</script>";
	}	
}
?>
