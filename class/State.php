<?php

class State{
	private $_State_id;
	private $_State_name;
	private $_Country_id;

	public function set_State_id($State_id){
		$this->_State_id=$State_id;
	}
	public function get_State_id(){
		return $this->_State_id;
	}
	public function set_State_name($State_name){
		$this->_State_name=$State_name;
	}
	public function get_State_name(){
		return $this->_State_name;
	}
	public function set_Country_id($Country_id){
		$this->_Country_id=$Country_id;
	}
	public function get_Country_id(){
		return $this->_Country_id;
	}

	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_state`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectstatecountrywise($cid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_state` WHERE `country_id`=$cid";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(State $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_state` (`state_name`,`country_id`) VALUES ('".$rec->get_State_name()."',".$rec->get_Country_id().")";
		$data=mysqli_query($conn,$qry);
	}
}
?>
