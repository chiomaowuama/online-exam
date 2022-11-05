<?php
session_start();

require_once("dbcontroller.php");
	
$db_handle = new DBController();
$conn = $db_handle->connectDB();

// Test Database Connection
if (!$conn) {
    die('Could not connect to Database');
}



$regno = $_POST['regno'];
$password = $_POST['password'];

if(isset($_SESSION["user"])){
    header("location:studentprofile.php");
}
else{
    if(!isset($regno) && !empty($regno)){
        die("the username is required");
    }

    if(!isset($password) && !empty($password)){
    die("the password is required");
    }

    $regno = str_replace("ExAm", "", $regno);

    $result = mysqli_query($conn, "SELECT * FROM candidates WHERE id ='$regno' AND password='$password'");
    // $selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

    if(mysqli_num_rows($result) > 0) {
       $user = mysqli_fetch_assoc($result);
        $_SESSION["user-data"] = $user;
        header("location: studentprofile.php");
    } else {
        die('candidate not found');
    }
}














?>