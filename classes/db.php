<?php
class Database{	

	protected $localhost = "localhost";
	protected $servername = "root";
	protected $password = "Patil@123";
	protected $database = "registaration";
	public $con;	
	

	public function connection() {
	    $this->con = new mysqli($this->localhost, $this->servername, $this->password, $this->database);
	    if ($this->con->connect_error) {
			die("failed connection: " . $this->con->connect_error);
	    }
		
	    return $this->con;
	}


}