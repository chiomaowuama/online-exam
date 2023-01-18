<?php require_once 'includes/session.php'; 

require_once __DIR__  . '/includes/db.php';
   
 
 $db_handle = new DBController();
 $conn = $db_handle->connectDB();

 $query = "select * from candidates";
 $admin = "select * from adminlogin";
 $result = mysqli_query($conn,$query);
 $results = mysqli_query($conn,$admin)
?>


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
            <!-- <div class="subject1"> -->
         
            <div class="subject2">
                <div class="adminrate">
                    <div class="adminwelcome">
                        <h1>welcome admin <?= $_SESSION["admin"]['firstname'] ?> !</h1>
                    </div>
                    <div class="adminrating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>

                    </div>
                </div>
            </div>
            <!-- thecards -->
            <div class="righthalf">
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
            <div class="tablediv">
                <table class="table"  >
                    <thead >
                        <tr>
                            <th colspan="5" class="table_title"> <p class="registered">Registered students </p></th>
                            <th class="view"><button class="viewbtn"><a href="#">View All</a><button> </th>
                            
                        </tr>
                    </thead>
                    <tr class="table_head">
                        <th class="table_head">Reg No:</th>
                        <th class="table_head">Name</th>
                        <th class="table_head">Surnname</th>
                        <th class="table_head">Email</th>
                        <th class="table_head">Reg Date</th>
                     
                    </tr>
                    <tr align="center" class="details" >
                       <?php
                        while($row = mysqli_fetch_assoc ($result))
                        {
                        ?>
                       <td  class="details"><?php echo $row ['id']; ?></td>
                       <td  class="details"><?php echo $row ['firstname']; ?></td>
                       <td  class="details"><?php echo $row ['sname']; ?></td>
                       <td  class="details"><?php echo $row ['email']; ?></td>
                    



                        </tr>
                        <?php

                        }

                       ?>
                    </tr>
                </table>
            </div>
            <div class="tablediv">
                <table class="table"  >
                    <thead >
                        <tr>
                            <th colspan="4" class="table_title"> <p class="registered">Registered Admin </p></th>
                            <th class="view"><button class="viewbtn"><a href="">View All</a></button> </th>
                            
                        </tr>
                    </thead>
                    <tr class="table_head">
                        <th class="table_head">Name:</th>
                        <th class="table_head">surname</th>
                        <th class="table_head">Gender</th>
                        
                        
                    </tr>
                    <tr align="center" class="details" >
                       <?php
                        while($row = mysqli_fetch_assoc ($results))
                        {
                        ?>
                       <td  class="details"><?php echo $row ['firstname']; ?></td>
                       <td  class="details"><?php echo $row ['sname']; ?></td>
                       <td  class="details"><?php echo $row ['gender']; ?></td>


                        </tr>
                        <?php

                        }

                       ?>
                    </tr>
                </table>
            </div>
            </div>

        </div>
    </div>
           
</body>