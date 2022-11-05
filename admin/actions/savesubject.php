<?php
    require_once '../includes/session.php'; 
    require_once '../includes/db.php';

    $subject = $_POST['subject'];

    if(!isset($subject) && empty($subject)){
        die("the subject name is required");
    }

    $subType= "insert into subjects(name) values('$subject')";

    if (!$result=mysqli_query($conn,$subType)) 
    {
        die('could not connect:check SQL insert query'.mysql_error($conn));
    }

    $subjectId = mysqli_insert_id($conn);

    header("location: ../addquestion.php?subject_id={$subjectId}");
?>
