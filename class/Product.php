<?php

class Product{
	private $_Product_id;
	private $_Product_name;
	private $_Category_id;
	private $_Product_description;
	private $_Product_image;
	private $_Product_weight;
	private $_Product_measure;
	private $_Product_size;

	public function set_Product_id($Product_id){
		$this->_Product_id=$Product_id;
	}
	public function get_Product_id(){
		return $this->_Product_id;
	}
	public function set_Product_name($Product_name){
		$this->_Product_name=$Product_name;
	}
	public function get_Product_name(){
		return $this->_Product_name;
	}
	public function set_Category_id($Category_id){
		$this->_Category_id=$Category_id;
	}
	public function get_Category_id(){
		return $this->_Category_id;
	}
	public function set_Product_description($Product_description){
		$this->_Product_description=$Product_description;
	}
	public function get_Product_description(){
		return $this->_Product_description;
	}
	public function set_Product_image($Product_image){
		$this->_Product_image=$Product_image;
	}
	public function get_Product_image(){
		return $this->_Product_image;
	}
	public function set_Product_weight($Product_weight){
		$this->_Product_weight=$Product_weight;
	}
	public function get_Product_weight(){
		return $this->_Product_weight;
	}
	public function set_Product_measure($Product_measure){
		$this->_Product_measure=$Product_measure;
	}
	public function get_Product_measure(){
		return $this->_Product_measure;
	}	
	public function set_Product_size($Product_size){
		$this->_Product_size=$Product_size;
	}
	public function get_Product_size(){
		return $this->_Product_size;
	}
	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_product`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectproductcategorywise($cid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_product` WHERE `category_id`='$cid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectproductfromid($pid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_product` WHERE `product_id`='$pid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(Product $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_product` (`product_name`,`category_id`,`product_description`,`product_image`,`product_weight`,`product_measure`,`product_size`) VALUES ('".$rec->get_Product_name()."',".$rec->get_Category_id().",'".$rec->get_Product_description()."','".$rec->get_Product_image()."',".$rec->get_Product_weight().",'".$rec->get_Product_measure()."','".$rec->get_Product_size()."')";
		$data=mysqli_query($conn,$qry);
		echo $qry;
	}
	public function update(Product $rec)
	{
		$conn=new mysqli("localhost","root","","testing");
		$qry="UPDATE `tbl_product` SET `product_name`='".$rec->get_Product_name()."',`category_id`=".$rec->get_Category_id().",`product_description`='".$rec->get_Product_description()."',`product_image`='".$rec->get_Product_image()."',`product_weight`=".$rec->get_Product_weight().",`product_measure`='".$rec->get_Product_measure()."',`product_size`='".$rec->get_Product_size()."' WHERE `Product_id`=".$rec->get_Product_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
	public function delete(Product $rec)
	{
		$conn=new mysqli("localhost","root","","testing");
		$qry="DELETE FROM `tbl_product` WHERE `Product_id`=".$rec->get_Product_id();
		$data=mysqli_query($conn,$qry);
		//echo $qry;	
	}
}
?>
