<?php

class Country
{

	private $_Country_id;
	private $_Country_name;

	public function set_Country_id($Country_id){
		$this->_Country_id=$Country_id;
	}
	public function get_Country_id(){
		return $this->_Country_id;
	}

	public function set_Country_name($Country_name){
		$this->_Country_name=$Country_name;
	}
	public function get_Country_name(){
		return $this->_Country_name;
	}

	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_country`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectcountryfromid($cid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_country` WHERE `Country_id`=$cid";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(Country $rec){
		$qry="INSERT INTO `tbl_country` (`country_name`) VALUES('".$rec->get_Country_name()."')";
		$data=mysqli_query($conn,$qry);
	}
}
?>