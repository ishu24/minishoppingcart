<!DOCTYPE html>
<html>
<head>
	<title>category</title>
</head>
<body>
	<h1 style="text-align: center;">ADD CATEGORY</h1>
	<form method="post" enctype="multipart/form-data">
<?php 
include_once("../class/Category.php");
$obj=new Category();
$cnm=$cdes=$a="";
if(isset($_POST["addcategory"])){
	$cnm=$_POST["txtcname"];
	$cdis=$_POST["txtcdis"];
	$cimg=$_FILES["imgcpic"]["name"];
	$cimgs=$_FILES["imgcpic"]["size"];
	$cimgt=$_FILES["imgcpic"]["type"];
	$cimgtemp=$_FILES["imgcpic"]["tmp_name"];
	if($cimg!=""){
		move_uploaded_file($cimgtemp, "../categoryimages/".$cnm);
		$a="../categoryimages/".$cnm;
	}
	$obj->set_Category_name($cnm);
	$obj->set_Category_description($cdis);
	$obj->set_Category_image($a);
	$obj->insert($obj);
}
?>
		<label>
			category name	
		</label>
		<input name="txtcname" type="text"></input>
		<br>
		<label>
			description
		</label>
		<textarea name="txtcdis" type="text"></textarea>
		<br>
		<label>
			image	
		</label>
		<input type="file" name="imgcpic"></input>
		<br>
		<button  name="addcategory">
		ADD CATEGORY
		</button>
	</form>
	<a href="index.php">BACK</a>
</body>
</html>