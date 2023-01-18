<?php
    require_once 'studentsession.php'; 
    require_once 'dbcontroller.php';
    $db_handle = new DBController();
    $conn = $db_handle->connectDB();
   
    $studentId = $_SESSION['user-data']['id'];
    $subjects = "select subjects.id, subjects.name, "
        . "(SELECT score FROM student_subject WHERE student_subject.subject_id = subjects.id AND student_subject.student_id = {$studentId}) as score, "
        . "(SELECT COUNT(*) FROM exam_questions WHERE subjects.id = exam_questions.subject_id) as questions_count "
        . "FROM subjects ORDER BY subjects.name ASC";    
    $result = mysqli_query($conn, $subjects);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input subject</title>
    <link rel="stylesheet" href="css/space2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="newdesign">
      <?php include 'side.php';?>
        <div class="otherside scroll">
            <?php include 'heading.php';?>
            <!-- <div class="subject1"> -->
            <div class="subject2">
                <form class="form1" name="signup" action="studentpasswordscript.php" method="post" >
                    <h3 class="reduce">Change Password</h3>
                    <label for="oldpassword" > Old password  </label>
                    <input type="password" id="oldpassword" class="fname" name="oldpassword" required>
                    <label for="newpassword"> New password </label>
                    <input type="password" id="newpassword" class="sname" name="newpassword" required>
                    <label for="Rnewpassword"> Confirm password </label>
                    <input type="password" id="Rnewpassword" class="gender" name="Rnewpassword" required>'
                    <button type="submit" class="headbutton1">Change</button>     
                </form>
            </div>
        </div>
    </div>

</body>