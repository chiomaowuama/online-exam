<?php
  require_once __DIR__  . '/../includes/session.php'; 

  session_destroy();
  unset($_SESSION["admin"]);
  header("location:../adminloging.php");

?>