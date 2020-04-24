<?php

class Stock{
	private $_Stock_id;
	private $_Product_id;
	private $_Stock_in;
	private $_Stock_date;
	private $_Stock_out;
	private $_Stock_product_changed_price;

	public function set_Stock_id($Stock_id){
		$this->_Stock_id=$Stock_id;
	}
	public function get_Stock_id(){
		return $this->_Stock_id;
	}
	public function set_Product_id($Product_id){
		$this->_Product_id=$Product_id;
	}
	public function get_Product_id(){
		return $this->_Product_id;
	}
	public function set_Stock_date($Stock_date){
		$this->_Stock_date=$Stock_date;
	}
	public function get_Stock_date(){
		return $this->_Stock_date;
	}
	public function set_Stock_in($Stock_in){
		$this->_Stock_in=$Stock_in;
	}
	public function get_Stock_in(){
		return $this->_Stock_in;
	}
	public function set_Stock_out($Stock_out){
		$this->_Stock_out=$Stock_out;
	}
	public function get_Stock_out(){
		return $this->_Stock_out;
	}
	public function set_Stock_product_changed_price($Stock_product_changed_price){
		$this->_Stock_product_changed_price=$Stock_product_changed_price;
	}
	public function get_Stock_product_changed_price(){
		return $this->_Stock_product_changed_price;
	}

	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_stock`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectminimumfromstockid($pid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT MIN(`stock_id`) FROM `tbl_stock` WHERE `product_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectstockfromproductid($pid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_stock` WHERE `product_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(Stock $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_stock` (`product_id`,`stock_date`,`stock_in`,`stock_product_changed_price`) VALUES (".$rec->get_Product_id().",'".$rec->get_Stock_date()."',".$rec->get_Stock_in().",".$rec->get_Stock_product_changed_price().")";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function update($sout,$id)
	{
		$conn=new mysqli("localhost","root","","testing");
		$qry="UPDATE `tbl_stock` SET `stock_out`=".$sout." WHERE `stock_id`=".$id;
		$data=mysqli_query($conn,$qry);
		echo $qry;
	}
}
?>
