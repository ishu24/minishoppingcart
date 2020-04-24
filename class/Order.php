<?php

class Order{
	private $_Order_id;
	private $_User_id;
	private $_Order_date;
	private $_Order_total;

	public function set_Order_id($Order_id){
		$this->_Order_id=$Order_id;
	}
	public function get_Order_id(){
		return $this->_Order_id;
	}
	public function set_Order_date($Order_date){
		$this->_Order_date=$Order_date;
	}
	public function get_Order_date(){
		return $this->_Order_date;
	}
	public function set_User_id($User_id){
		$this->_User_id=$User_id;
	}
	public function get_User_id(){
		return $this->_User_id;
	}
	public function set_Order_total($Order_total){
		$this->_Order_total=$Order_total;
	}
	public function get_Order_total(){
		return $this->_Order_total;
	}

	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_order`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectlastinsertedid(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT MAX(`order_id`) FROM `tbl_order`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	
	public function insert(Order $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_order` (`user_id`,`order_date`,`order_total`) VALUES (".$rec->get_User_id().",'".$rec->get_Order_date()."',".$rec->get_Order_total().")";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
}
?>
