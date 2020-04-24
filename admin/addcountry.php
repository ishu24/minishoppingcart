<!DOCTYPE html>
<html>
<head>
	<title>country</title>
</head>
<body>
	<h1 style="text-align: center;">ADD COUNTRY</h1>
<?php
include_once("../class/Country.php");
$obj=new Country();
$cnm="";
if(isset($_POST["addcountry"])){
	$cnm=$_POST["txtcountry"];
	$obj->set_Country_name($cnm);
	$obj->insert($obj);
}
?>
	<form method="post">
		<label>
			Country name	
		</label>
		<input name="txtcountry" type="text"></input>
		
		<br>
		<button name="addcountry">
		ADD COUNTRY
		</button>
	</form>
	<a href="index.php">BACK</a>
</body>
</html>