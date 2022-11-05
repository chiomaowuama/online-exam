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
                <form class="form1" name="signup" action=" actions/savecandidates.php" method="post" enctype="multipart/form-data" >
                <h3>Student Sign in</h3>
                <label for="fname" > Firstname </label>
                <input type="text" id="fname" class="fname" name="fname" required>
                <label for="sname"> Lastname </label>
                <input type="text" id="sname" class="sname" name="sname" required>
                <label for="gender"> Gender </label>
                <input type="text" id="gender" class="gender" name="gender" required>
                <label for="nation"> Nationality</label>
                <input type="text" id="nation" class="nation" name="nation" required>
                <label for="phone"> Phone No </label>
                <input type="phone" id="phoneno" class="phoneno" name="phoneno"required>
                <label for="email"> Email</label>
                <input type="text" id="email" class="email" name="email" placeholder="@gmail.com">
                <label for="password"> Password </label>
                <input type="password" id="password" class="password" name="password" required>
                <label for="rpassword">Re-enter </label>
                <input type="password" id="rpass" class="rpassword iden" name="rpass" required>
                <label for =" myprofilephoto" > Upload Passport </label>
				<input type="file" name="myprofilephoto" id="myprofilephoto" required />
                <button type="submit" class="buttn1">Sign Up </button>     
            </form>
                </div>
            </div>
        </div>
    </div>
</body>
