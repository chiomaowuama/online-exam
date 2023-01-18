<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nigerian Examination Board</title>
    <link rel="stylesheet" href="css/space.css">
</head>
<body>
    <div class="container">
        <div class="bigimage" >
            <div class="overlay"></div>
        </div>
        <div class="formsec">
            <form class="form1" name="signup" action="../actions/savecandidates.php" method="post" enctype="multipart/form-data" >
                <h3>student signin</h3>
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
                <button type="submit" class="headbutton1">Sign Up </button>     
            </form>

        </div>
    </div>    
</body>
</html>