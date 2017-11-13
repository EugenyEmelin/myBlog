<?php 
class User {
	public $id;
	public $fname;
	public $lname;
	public $name = $fname + ' ' + $lname;
	public $email;
	public $avatar;

	function __construct($id, $fname, $lname, $email, $avatar) {
		$this->$id = $id;
		$this->$fname = $fname;
		$this->$lname = $lname;
		$this->$email = $email;
		$this->$avatar = $avatar;
	}
}
?>