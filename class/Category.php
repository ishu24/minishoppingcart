<?php

class Category
{

	private $_Category_id;
	private $_Category_name;
	private $_Category_description;
	private $_Category_image;

	public function set_Category_id($Category_id){
		$this->_Category_id=$Category_id;
	}
	public function get_Category_id(){
		return $this->_Category_id;
	}

	public function set_Category_name($Category_name){
		$this->_Category_name=$Category_name;
	}
	public function get_Category_name(){
		return $this->_Category_name;
	}

	public function set_Category_description($Category_description){
		$this->_Category_description=$Category_description;
	}
	public function get_Category_description(){
		return $this->_Category_description;
	}

	public function set_Category_image($Category_image){
		$this->_Category_image=$Category_image;
	}
	public function get_Category_image(){
		return $this->_Category_image;
	}	

	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_Category`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectcategoryfromid($cid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_Category` WHERE `Category_id`=$cid";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(Category $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_Category` (`category_name`,`category_description`,`category_image`) VALUES('".$rec->get_Category_name()."','".$rec->get_Category_description()."','".$rec->get_Category_image()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
}
?>