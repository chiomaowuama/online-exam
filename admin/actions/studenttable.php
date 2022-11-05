<?php
 require_once __DIR__  . '/../includes/session.php'; 
 require_once __DIR__  . '/../includes/db.php';
   
 
 $db_handle = new DBController();
 $conn = $db_handle->connectDB();
 
?>