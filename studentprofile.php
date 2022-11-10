<?php
    require_once 'studentsession.php'; 
    require_once 'dbcontroller.php';
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
                <!-- <div id="countdown"></div> -->
                <div class="student_info">
                    <div class="personal_info">
                        <div><p>PERSONAL INFORMATION </p></div>
                    </div>
                    <div class="personal_infos">
                        <div class="tag_info">
                            <div class="infor-tags"><p>Firstname </p></div>
                            <div class="info"><?= $_SESSION["user-data"]['firstname']?></div>
                        </div>
                        <div class="tag_info">
                            <div class="infor-tags"><p>Surnname</p></div>
                            <div class="info"><?= $_SESSION["user-data"]['sname']?></div>
                        </div>
                        <div class="tag_info">
                            <div class="infor-tags"><p>Phone  No<span class="dot"></span></p></div>
                            <div class="info"><?= $_SESSION["user-data"]['phoneno']?></div>
                        </div>
                        <div class="tag_info">
                            <div class="infor-tags"><p>gender</p></div>
                            <div class="info"><?= $_SESSION["user-data"]['gender']?></div>
                        </div>
                        <div class="tag_info">
                            <div class="infor-tags"><p>nationality</p></div>
                            <div class="info"><?= $_SESSION["user-data"]['nationality']?></div>
                        </div>
                        <div class="tag_info">
                            <div class="infor-tags"><p>Email</p></div>
                            <div class="info"><?= $_SESSION["user-data"]['email']?></div>
                        </div>
                        <div class="tag_info"> 
                            <div class="infor-tags"><p>password </p></div>
                            <div class="info"><?= $_SESSION["user-data"]['password']?></div>
                        </div>
                    </div>
               </div>
            <div>
                
           
        </div>
    </div>
    <script src="script.js"></script>
</body>