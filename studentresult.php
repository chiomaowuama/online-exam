<?php
    require_once 'studentsession.php'; 
    require_once 'dbcontroller.php';
    $db_handle = new DBController();
    $conn = $db_handle->connectDB();
   

    $subjects = "select * from subjects";
    $result = mysqli_query($conn,$subjects);
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
                <div>
                <table class="table"  >
                    <thead >
                        <tr>
                            <th colspan="4" class="table_title"> <p class="registered">VIEW RESULTS</p></th>
                            
                        </tr>
                    </thead>
                    <tr class="table_head">
                        <th class="table_head">Exam name</th>
                        <th class="table_head">TOTAL</th>
                        <th class="table_head">GRADE</th>
                     
                     
                    </tr>
                    <tr align="center" class="details" >
                       <?php
                        while($row = mysqli_fetch_assoc ($result))
                        {
                        ?>
                       <td  class="details"><?php echo $row['name']; ?></td>
                       <td  class="details"><?php echo $row['duration']; ?></td>
                       <td  class="details"><?php echo $row['duration']; ?></td>

                       
                    



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