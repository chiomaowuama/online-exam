<?php
  require_once 'studentsession.php'; 

  session_destroy();
  unset($_SESSION["user-data"]);
  header("location:index.php");

?>