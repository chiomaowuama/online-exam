<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

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


<!-- mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class DBController 
{
	private $host = "chiomaxyz.com.ng";
    private $user = "chiomaxyzcom_nbexamuser";
    private $password = "SBPZZbPyAiG";
    private $database = "chiomaxyzcom_nbexam";
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
} -->