<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<h1 style="text-align: center;">LOG-IN</h1>
	<form method="post">
<?php
session_start();
include_once("class/User.php");
$obj=new User();
if(isset($_POST["btnlogin"])){
	$em=$_POST["txtemail"];
	$pwd=$_POST["txtpwd"];
	$rec=$obj->checklogin($em,$pwd);
	if($result=mysqli_fetch_array($rec)){
		$_SESSION["uid"]=$result[0];
		$_SESSION["uname"]=$result[1];
		if($result[11]=="Admin"){
			echo "<script>document.location='admin/index.php';</script>";
		}
		else{
			echo "<script>document.location='website/showcategory.php';</script>";
		}
	}
	else{
			echo "User name Does not Match";
	}
}
?>
		<label>email</label>
		<input name="txtemail" type="text"></input>
		<br>
		<label>password</label>
		<input name="txtpwd" type="password"></input>
		<br>
		<button type="submit" name="btnlogin">
		LOG-IN
		</button>
	</form>
	<a href="index.html">BACK</a>
</body>
</html>