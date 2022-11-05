<?php

require_once __DIR__ . "/../classes/DBController.php";
	
$db_handle = new DBController();
$conn = $db_handle->connectDB();

// Test Database Connection
if (!$conn) {
    die('Could not connect to Database');
}

?>
