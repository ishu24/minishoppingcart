<?php
include_once("../class/Product.php");
$obj1=new Product();
$cid=$_GET["q"];
$rec1=$obj1->selectproductcategorywise($cid);
		$data="<label>Choose product</label>
		<select name='optproduct' id='optProduct'>
			<option value=''>---select product---</option>";
		while($result1=mysqli_fetch_array($rec1)){

			$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
		}
		$data.="</select>
		<br>";
		echo $data;
?>