<!DOCTYPE html>
<html>
<head>
	<title>product</title>
</head>
<script>
function showproduct(str) {
    if (str.length == 0) { 
        document.getElementById("optProduct").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("optProduct").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "getproduct_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<body>
	<h1 style="text-align: center;">ADD STOCK</h1>
	<form method="post">
<?php
include_once("../class/Category.php");
$obj=new Category();
$rec=$obj->select();
include_once("../class/Product.php");
$obj1=new Product();
$rec1=$obj1->select();
include_once("../class/Stock.php");
$obj2=new Stock();
if(isset($_POST["addstock"])){
	if(isset($_POST["optproduct"])){
		$pid=$_POST["optproduct"];
	}
	$dt=$_POST["txtSdate"];
	$sin=$_POST["txtStockin"];
	$pprice=$_POST["txtpprice"];
	$obj2->set_Product_id($pid);
	$obj2->set_Stock_date($dt);
	$obj2->set_Stock_in($sin);
	$obj2->set_Stock_product_changed_price($pprice);
	$obj2->insert($obj2);
}
		$data="<label>Choose category</label>
		<select name='optcategory' onchange='showproduct(this.value)'>
			<option value=''>---select category---</option>";
		while ($result1=mysqli_fetch_array($rec1)){
		while($result=mysqli_fetch_array($rec)){

			$data.="<option value='".$result[0]."'>".$result[1]."</option>";
		}
	}
		$data.="</select>
		<br>";

		$data.="<label>Choose product</label>
		<select name='optproduct' id='optProduct'>
			<option value=''>---select product---</option>";
		while($result1=mysqli_fetch_array($rec1)){
			$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
		}
		$data.="</select>
		<br>";
		echo $data;
?>
		<label>
			Date
		</label>
		<input type="date" name="txtSdate"></input>
		<br>
		<label>
			product price on /weight measure(etc. 1 kg,1 Psc.)
		</label>
		<input type="text" name="txtpprice"></input>Rs/-
		<br>
		<label>
			Stock IN	
		</label>
		<input name="txtStockin" type="text"></input>
		<br>
		<button type="submit" name="addstock">
		ADD STOCK
		</button>
	</form>
	<a href="index.php">BACK</a>
</body>
</html>