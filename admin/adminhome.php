<?php
    session_start();

    if (!isset($_SESSION['admin'])) {
        header('location:adminloging.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentProfile</title>
    <!-- <link rel="stylesheet" href="css/space.css"> -->
    
    <link rel="stylesheet" href="../css/space2.css">
    <link rel="stylesheet" href="admincss/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php include 'adminheader.php';?>
<div class=" overall">
    <div class="lefthalf"></div>
    <div  class="righthalf">
        <div class="topcards">
            <div class="onegrid sharp">
            <i class="fa-solid fa-user-tie"></i>
            <h3>3</h3>
            <h3>number of admins</h3>
            </div>
            <div class="twogrid sharp">
            <i class="fa-solid fa-users"></i>
            <h3>70</h3>
            <h3>number of students </h3>
            </div>
            <div class="threegrid sharp">
            <i class="fa-sharp fa-solid fa-user-tag"></i>
            <h3>50</h3>
            <h3>registered students</h3>
            </div>
            <div class="fourgrid sharp">
            <i class="fa-sharp fa-solid fa-user-slash"></i>
            <h3>20</h3>
            <h3>unregistered students </h3>
            </div>
        </div>
    </div>
</div>
</body>