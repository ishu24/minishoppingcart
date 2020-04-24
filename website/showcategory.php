<!DOCTYPE html>
<html>
<head>
	<title>Shooping cart</title>
</head>
<body>
	<h1 style="font-size: 50px; text-align: center;">Shopping cart-<a href="tempcart.php">
	<?php
	session_start();
	echo count($_SESSION["shopping_cart"]); 
	?></a></h1>
	<p style="text-align: right;"><a href="../logout.php">Log out</a></p>
	<p style="text-align: left;">
		welcome-
		<?php
	echo $_SESSION["uname"];
	?>
<?php
include_once("../class/Category.php");
$obj=new Category();
$rec=$obj->select();
	$data="<br>";
	while($result=mysqli_fetch_array($rec)){
			$data.="
			<a href='showproduct.php?Id=".$result[0]."'>
			<img src='".$result[3]."'></img>
			
			".$result[1]."</a>
			
			";
	}
	echo $data;
?>

</body>
</html>