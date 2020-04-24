<?php

class User{
	private $_User_id;
	private $_User_firstname;
	private $_User_lastname;
	private $_User_email;
	private $_User_password;
	private $_User_contact;
	private $_User_address;
	private $_User_gender;
	private $_User_state_id;
	private $_User_hobby;
	private $_User_image;
	private $_User_type;

	public function set_User_id($User_id){
		$this->_User_id=$User_id;
	}
	public function get_User_id(){
		return $this->_User_id;
	}
	public function set_User_firstname($User_firstname){
		$this->_User_firstname=$User_firstname;
	}
	public function get_User_firstname(){
		return $this->_User_firstname;
	}
	public function set_User_lastname($User_lastname){
		$this->_User_lastname=$User_lastname;
	}
	public function get_User_lastname(){
		return $this->_User_lastname;
	}
	public function set_User_email($User_email){
		$this->_User_email=$User_email;
	}
	public function get_User_email(){
		return $this->_User_email;
	}
	public function set_User_password($User_password){
		$this->_User_password=$User_password;
	}
	public function get_User_password(){
		return $this->_User_password;
	}
	public function set_User_contact($User_contact){
		$this->_User_contact=$User_contact;
	}
	public function get_User_contact(){
		return $this->_User_contact;
	}
	public function set_User_address($User_address){
		$this->_User_address=$User_address;
	}
	public function get_User_address(){
		return $this->_User_address;
	}
	public function set_User_gender($User_gender){
		$this->_User_gender=$User_gender;
	}
	public function get_User_gender(){
		return $this->_User_gender;
	}
	public function set_User_state_id($User_state_id){
		$this->_User_state_id=$User_state_id;
	}
	public function get_User_state_id(){
		return $this->_User_state_id;
	}
	public function set_User_hobby($User_hobby){
		$this->_User_hobby=$User_hobby;
	}
	public function get_User_hobby(){
		return $this->_User_hobby;
	}
	public function set_User_image($User_image){
		$this->_User_image=$User_image;
	}
	public function get_User_image(){
		return $this->_User_image;
	}	
	public function select(){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_user`";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function selectuserfromid($uid){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_user` WHERE `user_id`='$uid'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function checklogin($em,$pwd){
		$conn=new mysqli("localhost","root","","testing");
		$qry="SELECT * FROM `tbl_user` WHERE `User_email`='$em' and `User_password`='$pwd'";
		$data=mysqli_query($conn,$qry);
		return $data;
	}
	public function insert(User $rec){
		$conn=new mysqli("localhost","root","","testing");
		$qry="INSERT INTO `tbl_user` (`User_firstname`,`User_lastname`,`User_email`,`User_password`,`User_contact`,`User_address`,`User_gender`,`user_state`,`user_hobby`,`user_image`) VALUES ('".$rec->get_User_firstname()."','".$rec->get_User_lastname()."','".$rec->get_User_email()."','".$rec->get_User_password()."','".$rec->get_User_contact()."','".$rec->get_User_address()."','".$rec->get_User_gender()."',".$rec->get_User_state_id().",'".$rec->get_User_hobby()."','".$rec->get_User_image()."')";
		$data=mysqli_query($conn,$qry);
		//echo $qry;
	}
}
?>
