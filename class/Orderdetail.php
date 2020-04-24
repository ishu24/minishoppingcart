<?php

class Orderdetail{
	private $_Orderdetail_id;
	private $_Order_id;
	private $_Product_id;
	private $_Product_qty;
	private $_Product_totalprice;

	public function set_Order_id($Order_id){
		$this->_Order_id=$Order_id;
	}
	public function get_Order_id(){
		return $this->_Order_id;
	}
	public function set_Orderdetail_id($Orderdetail_id){
		$this->_Orderdetail_id=$Orderdetail_id;
	}
	public function get_Orderdetail_id(){
		return $this->_Orderdetail_id;
	}
	public function set_Product_id($Product_id){
		$this->_Product_id=$Product_id;
	}
	public function get_Product_id(){
		return $this->_Product_id;
	}
	public function set_Product_qty($Product_qty){
		$this->_Product_qty=$Product_qty;
	}
	public function get_Product_qty(){
		return $this->_Product_qty;
	}
	public function set_Product_totalprice($Product_totalprice){
		$this->_Product_totalprice=$Product_totalprice;
	}
	public function get_Product_totalprice(){
		return $this->_Product_totalprice;
	}

	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_orderdetail`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectfromorderid($oid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_orderdetail` WHERE `order_id`='$oid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	
	public function insert(Orderdetail $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_orderdetail` (`order_id`,`Product_id`,`Product_qty`,`Product_totalprice`) VALUES (".$rec->get_Order_id().",".$rec->get_Product_id().",".$rec->get_Product_qty().",".$rec->get_Product_totalprice().")";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
}
?>
