<?php

session_start();

require_once '../includes/db.php';

if(isset($_SESSION["admin"])){
    header("location:../newhomeadmin.php");
    die();
}

$username = $_POST['username'];
$password = $_POST['password'];

if(!isset($username) && empty($username)){
    die("the username is required");
}

if(!isset($password) && empty($password)){
    die("the password is required");
}

$result = mysqli_query($conn, "SELECT * FROM adminlogin WHERE username ='$username' AND password='$password'");
// $selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if(mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION["admin"] = $user;
    header("location:../newhomeadmin.php");
} else {
    die('Admin not found');
}

?>