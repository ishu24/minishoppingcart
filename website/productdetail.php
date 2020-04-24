<!DOCTYPE html>
<html>
<head>
	<title>Shooping cart</title>
</head>
<body>
	<h1 style="font-size: 50px; text-align: center;">Shopping cart-<a href="tempcart.php"><?php
	session_start();
	echo count($_SESSION["shopping_cart"]); 
	?></a></h1>
<?php
include_once("../class/Product.php");
$obj=new Product();
include_once("../class/Stock.php");
$obj1=new Stock();
$pid=$_GET["Id"];
$rec=$obj->selectproductfromid($pid);
	$data="";
	$result=mysqli_fetch_array($rec);
	$rec1=$obj1->selectstockfromproductid($result[0]);
	$sin=$sout=$total=$avge=$sprice=$i="";
			while ($result1=mysqli_fetch_array($rec1)) {
				$i++;
				$sin+=$result1[3];
				$sout+=$result1[4];
				$sprice+=$result1[5];
			}
			$total=$sin-$sout;
			$avge=$sprice/$i;
if(isset($_POST["addtocart"])){
	$qty=$_POST["txtqty"];
	if($qty<=$sin){
		if(isset($_SESSION["shopping_cart"])){
		$item_array_id=array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["Id"], $item_array_id)){
			$count=count($_SESSION["shopping_cart"]);
			$item_array=array(
			'item_id' =>$_GET["Id"],
			'item_name' =>$_POST["hidden_name"],
			'item_price' =>$_POST["hidden_price"],
			'item_quantity' =>$_POST["txtqty"]
		);
			$_SESSION["shopping_cart"][$count]=$item_array;
		}
		else{
			echo '<script>alert("item already added")</script>';
			echo '<script>window.location="tempcart.php"</script>';
		}
	}
	else{
		$item_array=array(
			'item_id' =>$_GET["Id"],
			'item_name' =>$_POST["hidden_name"],
			'item_price' =>$_POST["hidden_price"],
			'item_quantity' =>$_POST["txtqty"]
		);
		$_SESSION["shopping_cart"][0]=$item_array;
	}

	}
	
}
if(isset($_GET["action"])){
	if($_GET["action"]=="delete"){
			foreach($_SESSION["shopping_cart"] as $keys => $values){
				if($values["item_id"]== $_GET["Id"]){
					unset($_SESSION["shopping_cart"][$keys]);
					echo '<script>alert("item removed")</script>';
					echo '<script>window.location="tempcart.php"</script>';
				}
			}
	}
}
		$data.="
		<form method='post' action='productdetail?Id=".$result[0]."&action=add'>
		<img src=".$result[4]." width='100' height='100'>
		<br>
		<b>".$result[1]."</b>
		<br>
		Price:".$avge." Rs/".$result[5]."".$result[6]."
		<br>
		Size:".$result[7]."
		<br>
		<lable>Qty: </lable>
		<input type='text' name='txtqty'></input>
		<select name='optmeasure'>
			<option value='Kg'>Kg</option>
			<option value='gms'>gms</option>
			<option value='meter'>meter</option>
			<option value='liter'>liter</option>
			<option value='Pcs'>Pcs</option>
		</select>
		<br>
		<input type='hidden' name='hidden_name' value=".$result[1].">
		<input type='hidden' name='hidden_price' value=".$avge.">
		<button name='addtocart'>Add to Cart</button>
		<a href='showproduct.php?Id=".$result[2]."'>continue Shooping</a>";
	echo $data;
?>
</form>
	
</body>
</html>
