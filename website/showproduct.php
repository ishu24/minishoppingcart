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
$cid=$_GET["Id"];
$rec=$obj->select();

	while($result=mysqli_fetch_array($rec)){
		$sin=$sout=$total=$avge=$sprice=$i="";
		if($result[2]==$cid){
			$rec1=$obj1->selectstockfromproductid($result[0]);
			while ($result1=mysqli_fetch_array($rec1)) {
				$i++;
				$sin+=$result1[3];
				$sout+=$result1[4];
				$sprice+=$result1[5];
			}
			
			if($sin>1){
				$total=$sin-$sout;
			$avge=$sprice/$i;
?>			
			<p>=======================================</p>
			<a href='productdetail.php?Id=<?php echo $result[0];?>'>
			<img src="<?php echo $result[4]; ?>" width='100' height='100'></a>
			<br>
			<?php echo $result[3]; ?>
			<br>
			<b><?php echo $result[1]; ?></b>
			<br>
			Price:<?php echo $avge; ?> Rs/<?php echo $result[5]; ?><?php echo $result[6];?>
			<br>
			Size: <?php echo $result[7];?>
			<br>

<?php
			}
			else{
?>
			<p>=======================================</p>
			<b>OUT OF STOCK</b>
			<br>
			<img src="<?php echo $result[4]; ?>" width='100' height='100'>
			<br>
			<?php echo $result[3]; ?>
			<br>
			<b><?php echo $result[1]; ?></b>
			<br>
			Price:0 Rs/<?php echo $result[5]; ?><?php echo $result[6];?>
			<br>
			Size: <?php echo $result[7];?>
			<br>
<?php
			}
		}

	}
	
?>
<a href='showcategory.php'>Continue shopping</a>
</body>
</html>
