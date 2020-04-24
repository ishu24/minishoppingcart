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
include_once("../class/Order.php");
$obj=new Order();
include_once("../class/Orderdetail.php");
$obj1=new Orderdetail();
include_once("../class/Stock.php");
$obj2=new Stock();
if(isset($_POST["placeorder"])){
	$uid=$_SESSION["uid"];
	$total=$_SESSION["finaltotal"];
	$obj->set_User_id($uid);
	$obj->set_Order_total($total);
	$obj->set_Order_date(date('yy-m-d'));
	$obj->insert($obj);	
	$res=$obj->selectlastinsertedid();
	$lidres=mysqli_fetch_array($res);

	foreach($_SESSION["shopping_cart"] as $keys => $values){
		$pid=$values["item_id"];
		$pqty=$values["item_quantity"];

		$rec2=$obj2->selectminimumfromstockid($pid);
		$sidres=mysqli_fetch_array($rec2);
		$obj2->update($pqty,$sidres[0]);

		$ptprice=$values["item_quantity"] * $values["item_price"];
		$obj1->set_Order_id($lidres[0]);
		$obj1->set_Product_id($pid);
		$obj1->set_Product_qty($pqty);
		$obj1->set_Product_totalprice($ptprice);
		$obj1->insert($obj1);
	}
	$_SESSION["finaltotal"]="";
	$_SESSION["shopping_cart"]="";
}
?>
<form method="post">

		<?php 
		if(!empty($_SESSION["shopping_cart"])){
			$total=0;
		?>
		<table border="1">
		<tr>
			<th>Name</th>
			<th>quantity</th>
			<th>Unit price</th>
			<th>price</th>
			<th>Action</th>
		</tr>
		<?php
			foreach($_SESSION["shopping_cart"] as $keys => $values){
		?>
		<tr>	
		<td>
			<?php echo $values["item_name"]; ?>
		</td>
		<td><?php echo $values["item_quantity"]; ?></td>
		<td><?php echo $values["item_price"]; ?></td>
		<td>
			<?php echo $values["item_quantity"]*$values["item_price"]; ?>
		</td>
		<td>
			<a href="productdetail?Id=<?php echo $values["item_id"];?>&action=delete">Remove</a>
		</td>
	</tr>
	<?php
		$total=$total+($values["item_quantity"] * $values["item_price"]);
		$_SESSION["finaltotal"]=$total;
			}
	?>
	<tr>
		<td colspan="3" style="text-align: right;">total</td>
		<td><?php echo $total; ?></td>
		<td></td>
	</tr>
</table>
<button name='placeorder'>PLACE ORDER</button>

<?php
		}
	?>	
		<h3>Cart is Empty</h3>
		<a href='showcategory.php'>continue Shooping</a>

</form>	
</body>
</html>