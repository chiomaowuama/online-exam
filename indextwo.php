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
            <form class="form1" name="signup" action="savecandidates.php" method="post" enctype="multipart/form-data" >
                <h3>Sign up to the Board</h3>
                <h5> Already have an Account <a href="signin.php">sign in</a></h5>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudentProfile</title>
    <!-- <link rel="stylesheet" href="css/space.css"> -->
    
    <link rel="stylesheet" href="css/space2.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'header.php';?>
    <div class ="homebod">
        <div class=profile-left>
            <div class="courses">
                <h3>Upcomming Exams</h3>
                <table>
                    <tr>
                        <th >Exams</th>
                        <th>Total Mark</th>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td class="percent"> 100%</td>
                    
                    </tr>
                    <tr>
                        <td>literature</td>
                        <td class="percent">100%</td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td class="percent">100%</td>
                    </tr>
                </table>

            </div>
            <div class= "progress" >
                <div>
                    <h3>Class Progress</h3>
                </div>
                <div class="bars">
                    <div class="firstbar">
                        <div class="leftbar" >
                            <h5>Computer</h5>
                        </div>
                        <div class="rightbar">
                            <div class="transparentbar">
                                <div class="colorbar"></div>
                            </div>
                        </div>
                    </div>
                    <div class="firstbar">
                        <div class="leftbar" >
                            <h5>Economics</h5>
                        </div>
                        <div class="rightbar">
                            <div class="transparentbar">
                                <div class="colorbar1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="firstbar">
                        <div class="leftbar" >
                            <h5>civics</h5>
                        </div>
                        <div class="rightbar">
                            <div class="transparentbar">
                                <div class="colorbar2"></div> 
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </div>
        </div>
        <div class=information>
            <div class ="info-card">
                <div class= "info-cardhead">
                <h2>Student Information</h2>
                </div>
                <table>
                    <tr class="bothnames">
                        <td class="infor-tags">Firstname</td>
                        <td class="info"><?= $_SESSION["user-data"]['firstname']?></td>
                    </tr>
                    <tr class="bothnames">
                        <td class="infor-tags">Surnname:</td>
                        <td class="info"><?= $_SESSION["user-data"]['sname']?></td>
                    </tr>
                    <tr class="bothnames">
                        <td class="infor-tags">Phone No:</td>
                        <td class="info"><?= $_SESSION["user-data"]['phoneno']?></td>
                    </tr>
                    <tr class="bothnames">
                        <td class="infor-tags">gender:</td>
                        <td class="info"><?= $_SESSION["user-data"]['gender']?></td>
                    </tr>
                    <tr class="bothnames">
                        <td class="infor-tags">nationality:</td>
                        <td class="info"><?= $_SESSION["user-data"]['nationality']?></td>
                    </tr>
                    <tr class="bothnames">
                        <td class="infor-tags">Email:</td>
                        <td class="info"><?= $_SESSION["user-data"]['email']?></td>
                    </tr>
                    <tr class="bothnames"> 
                        <td class="infor-tags">password</td>
                        <td class="info"><?= $_SESSION["user-data"]['password']?></td>
                    </tr>
                </table>
            </div>
           
        </div>
        <div class="logout">
            <div class ="logout-card">
                <div class ="imagecard">
                    <img src=<?= $_SESSION["user-data"]['photo']?> alt="">
                </div>
                <button type= "submit" class="logoutbtn"> Logout</button>
            </div>
            <div class="courses history">
                <h3>Exams history</h3>
                <table>
                    <tr>
                        <th >Exams</th>
                        <th>Total Mark</th>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td class="percent"> 100%</td>
                    
                    </tr>
                    <tr>
                        <td>literature</td>
                        <td class="percent">100%</td>
                    </tr>
                    <tr>
                        <td>History</td>
                        <td class="percent">100%</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <?php require_once 'includes/session.php'; 

require_once __DIR__  . '/includes/db.php';
   
 
 $db_handle = new DBController();
 $conn = $db_handle->connectDB();

 $query = "select * from candidates";
 $admin = "select * from adminlogin";
 $result = mysqli_query($conn,$query);
 $results = mysqli_query($conn,$admin)
?>

    
</body>
</html>