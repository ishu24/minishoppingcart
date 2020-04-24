<?php
include_once("../class/State.php");
$obj1=new State();
$cid=$_GET["q"];
$rec1=$obj1->selectstatecountrywise($cid);
		$data="<label>Choose State</label>
		<select name='optstate' id='optState'>
			<option value=''>---select state---</option>";
		while($result1=mysqli_fetch_array($rec1)){

			$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
		}
		$data.="</select>
		<br>";
		echo $data;
?>