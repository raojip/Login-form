<?php
session_start();
include_once "db.php";

class User {

	public $userTable;
	public $dbObj;
	public $con;

	public function __construct() {
	    $this->userTable = "users";
	    $this->dbObj = new Database();
	    $this->con = $this->dbObj->connection();
	}

	public function registration() {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);	

        $query ="INSERT INTO $this->userTable (name, email, password)
        VALUES('$name', '$email', '$password')";

        if ($this->con->query($query)) {
            return true;
        } else {
            return false;
        }
	}

	public function login() {
	    $email = $_POST['email'];
	    $password = md5($_POST['password']);

	    $query = "SELECT * FROM $this->userTable WHERE email = '$email' && password = '$password'";
	    $result = $this->con->query($query);
	    while ($user_data = $result->fetch_assoc()) {
			$_SESSION['id'] = $user_data['id'];
			$_SESSION['name'] = $user_data['name'];
	    }

		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function isuserExist($email) {
    	$query = "SELECT * FROM $this->userTable WHERE email ='$email'";
	    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			return true;
		} else {
	    	return false;
	    }
	}		
}


$userobj = new User();