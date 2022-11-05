<?php

class DBController 
{
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "nbexam";
	private $conn;
	
	// Initialize variable
	function __construct() 
	{
		$this->conn = $this->connectDB();
	}
	
	function connectDB()
	{
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		return $conn;
	}
}
?>