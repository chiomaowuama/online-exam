<?php require_once 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input subject</title>
    <link rel="stylesheet" href="admincss/newstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="newdesign">
      <?php include './includes/sidebar.php';?>
        <div class="otherside scroll">
            <?php include './includes/fixedhead.php';?>
            <div class="subject1">
                <div class="subject2a">
                    <form class="form1" name="signup" action=" actions/changepasswordscript.php" method="post" >
                        <h3>Student Sign in</h3>
                        <label for="oldpassword" > old password  </label>
                        <input type="password" id="oldpassword" class="fname" name="oldpassword" required>
                        <label for="newpassword"> newpassword </label>
                        <input type="password" id="newpassword" class="sname" name="newpassword" required>
                        <label for="Rnewpassword"> confirm password </label>
                        <input type="password" id="Rnewpassword" class="gender" name="Rnewpassword" required>'
                        <button type="submit" class="buttn1">Submit</button>     
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>'