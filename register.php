<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<script>
function showstate(str) {
    if (str.length == 0) { 
        document.getElementById("optState").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("optState").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "admin/getstate_ajax.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<body>
	<h1 style="text-align: center;">Register</h1>
	<form method="post" enctype="multipart/form-data">
<?php
include_once("class/Country.php");
$obj=new Country();
$rec=$obj->select();
include_once("class/State.php");
$obj1=new State();
$rec1=$obj1->select();
include_once("class/User.php");
$obj2=new User();

if(isset($_POST["adduser"])){
	$fnm=$_POST["txtfirstname"];
	$lnm=$_POST["txtlastname"];
	$email=$_POST["txtemail"];
	$pwd=$_POST["txtpassword"];
	$con=$_POST["txtcontact"];
	$addr=$_POST["txtaddress"];
	if(isset($_POST["txtgender"])){
		$sex=$_POST["txtgender"];
	}
	if(isset($_POST["optstate"])){
		$st=$_POST["optstate"];
	}
	$hobbies=$_POST["txthobby"];
	$hobby=$a="";
	foreach($hobbies as $hob)  
   {  
      $hobby.= $hob.",";  
   } 
	$img=$_FILES["imguserpic"]["name"];
	$imgs=$_FILES["imguserpic"]["size"];
	$imgt=$_FILES["imguserpic"]["type"];
	$imgtemp=$_FILES["imguserpic"]["tmp_name"];
	if($img!=""){
		move_uploaded_file($imgtemp, "userimages/".$fnm.$lnm.$st.$img);
		$a="userimages/".$fnm.$lnm.$st.$img;
	}
	$obj2->set_User_firstname($fnm);
	$obj2->set_User_lastname($lnm);
	$obj2->set_User_email($email);
	$obj2->set_User_password($pwd);
	$obj2->set_User_contact($con);
	$obj2->set_User_address($addr);
	$obj2->set_User_gender($sex);
	$obj2->set_User_state_id($st);
	$obj2->set_User_hobby($hobby);
	$obj2->set_User_image($a);
	$obj2->insert($obj2);
}
?>
		<label>
			Firstname	
		</label>
		<input name="txtfirstname" type="text"></input>
		<br>
		<label>
			Lastname	
		</label>
		<input name="txtlastname" type="text"></input>
		<br>
		<label>
			email	
		</label>
		<input name="txtemail" type="text"></input>
		<br>
		<label>
			password	
		</label>
		<input name="txtpassword" type="password"></input>
		<br>
		<label>
			contact	
		</label>
		<input name="txtcontact" type="text"></input>
		<br>
		<label>
			Address	
		</label>
		<textarea name="txtaddress"></textarea>
		<br>
		<label>
			Sex	
		</label>
		<input type="radio" name="txtgender" value="male">Male
		<input type="radio" name="txtgender" value="female">Female
		<br>
<?php
	$data="<label>country</label>
		<select name='optcountry' onchange='showstate(this.value)'>
			<option value=''>---select country---</option>";
			while($result1=mysqli_fetch_array($rec1)){
				while($result=mysqli_fetch_array($rec)){
					$data.="<option value='".$result[0]."'>".$result[1]."</option>";
				}
			}
		$data.="</select>
		<br>
		<label>
			state	
		</label>
		<select name='optstate' id='optState'>
			<option value=''>---select state---</option>";
			while($result1=mysqli_fetch_array($rec1)){
				$data.="<option value='".$result1[0]."'>".$result1[1]."</option>";
			}
		$data.="</select>
		<br>";
		echo $data;
?>
		<label>
			Hobbies
		</label>
		<input type="checkbox" name="txthobby[]" value="Reading">Reading
		<input type="checkbox" name="txthobby[]" value="Travelling">Travelling
		<input type="checkbox" name="txthobby[]" value="Cleaning">Cleaning
		<br>
		<label>
			Image
		</label>
		<input type="file" name="imguserpic">
		<br>
		<button name="adduser">
		REGISTER
		</button>
	</form>
	<a href="index.html">BACK</a>
</body>
</html>