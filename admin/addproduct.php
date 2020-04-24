<!DOCTYPE html>
<html>
<head>
	<title>product</title>
</head>
<body>
	<h1 style="text-align: center;">ADD PRODUCT</h1>
	<form method="post" enctype="multipart/form-data">
<?php
include_once("../class/Category.php");
$obj=new Category();
$rec=$obj->select();
include_once("../class/Product.php");
$obj1=new Product();

$pnm=$pdes=$pprice=$cid=$a="";
$cat=$desc=$pic=$wei=$mea=$sz="";
if(isset($_GET["Id"])){
	$pid=$_GET["Id"];
	$rec3=$obj1->selectproductfromid($pid);
	while ($result=mysqli_fetch_array($rec3)) {
		$pnm=$result[1];
		$cat=$result[2];
		$desc=$result[3];
		$pic=$result[4];
		$wei=$result[5];
		$mea=$result[6];
		$sz=$result[7];
	}
}
if(isset($_POST["addproduct"])){
	if(isset($_POST["optcategory"])){
		$cid=$_POST["optcategory"];
	}
	$pnm=$_POST["txtpname"];
	$pdes=$_POST["txtpdis"];
	$pweg=$_POST["txtpweight"];
	$pmea=$_POST["txtpmeasure"];
	$sz=$_POST["txtsize"];
	$pimg=$_FILES["imgppic"]["name"];
	$pimgs=$_FILES["imgppic"]["size"];
	$pimgt=$_FILES["imgppic"]["type"];
	$pimgtemp=$_FILES["imgppic"]["tmp_name"];
	if($pimg!=""){
		move_uploaded_file($pimgtemp, "../productimages/".$pnm.$sz);
		$a="../productimages/".$pnm.$sz;
	}
	$obj1->set_Product_name($pnm);
	$obj1->set_Product_description($pdes);
	$obj1->set_Product_image($a);
	$obj1->set_Product_weight($pweg);
	$obj1->set_Product_measure($pmea);
	$obj1->set_Product_size($sz);
	$obj1->set_Category_id($cid);

	if($pid!=""){
			$obj1->set_Product_id($pid);
			$obj1->update($obj1);
			
		}
		else{
			$obj1->insert($obj1);
		}
		echo "<script type='text/javascript'>location.href = 'viewproduct.php'</script>";
}
		$data="<label>Choose category</label>
		<select name='optcategory'>
			<option value=''>---select category---</option>";
		while($result=mysqli_fetch_array($rec)){
			if($cat==$result[0])
												{
													$data.="<option value='".$result[0]."' selected>".$result[1]."</option>";
												}
												else
												{
													$data.="<option value='".$result[0]."'>".$result[1]."</option>";
												}
		}
		$data.="</select>
		<br>";
		echo $data;
?>
		<label>
			product name	
		</label>
		<input name="txtpname" type="text" value="<?php echo $pnm;?>"></input>
		<br>
		<label>
			description
		</label>
		<textarea name="txtpdis" ><?php echo $desc; ?></textarea>
		<br>
		<label>
			image	
		</label>
		<input name="imgppic" type="file"></input>
		<?php
											if($pic!=""){
												$data="<img src='$pic' height='100' width='100'>";
											}
											else{
												$data="";
											}
											echo $data;
										?>
		<br>
		<label>
			product purchase on this weight
		</label>
		<input type="text" name="txtpweight" value="<?php echo $wei;?>"></input>
		<br>
		<label>
			measure
		</label>
		<select name="txtpmeasure">
			<option value=''>----select measure----</option>
			<option value="Kg">Kg</option>
			<option value="gm">gm</option>
			<option value="meter">meter</option>
			<option value="liter">liter</option>
			<option value="Pcs">Pcs</option>
		</select>
		<br>
		<label>
			product size ::if clothes(etc. S,M,28,30,...)
		</label>
		<input type="text" name="txtsize" value="<?php echo $sz;?>"></input>
		<br>
		<button  name="addproduct">
		ADD PRODUCT
		</button>
	</form>
	<a href="index.php">BACK</a>
</body>
</html>