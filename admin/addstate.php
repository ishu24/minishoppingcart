<!DOCTYPE html>
<html>
<head>
	<title>state</title>
</head>
<body>
	<h1 style="text-align: center;">ADD STATE</h1>

	<form method="post">
<?php
include_once("../class/Country.php");
$obj=new Country();
$rec=$obj->select();
include_once("../class/State.php");
$obj1=new State();
$snm=$cid="";

if(isset($_POST["addstate"])){
	if(isset($_POST["optcountry"])){
		$cid=$_POST["optcountry"];	
	}
	$snm=$_POST["txtstate"];
	$obj1->set_State_name($snm);
	$obj1->set_Country_id($cid);
	$obj1->insert($obj1);
}
		$data="<label>Choose country</label>
		<select name='optcountry'>
			<option value=''>---select country---</option>
			";
			while($result=mysqli_fetch_array($rec)){
				$data.="<option value='".$result[0]."'>".$result[1]."</option>";
			}
			

		$data.="</select>
		<br>";
		echo $data;
?>
		<label>
			State name	
		</label>
		<input name="txtstate" type="text"></input>
		<br>
		<button name="addstate">
		ADD STATE
		</button>
	</form>
	<a href="index.php">BACK</a>
</body>
</html>