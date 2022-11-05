<?php
    session_start();

    if (!isset($_SESSION['user-data'])) {
        header('location:index.php');
        die();
    }
?>