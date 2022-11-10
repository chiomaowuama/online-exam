<?php require_once 'includes/session.php'; 

require_once __DIR__  . '/includes/db.php';
   
 
 $db_handle = new DBController();
 $conn = $db_handle->connectDB();

 $query = "select * from candidates";
 $admin = "select * from adminlogin";
 $result = mysqli_query($conn,$query);
 $results = mysqli_query($conn,$admin);

 $studentId = $_SESSION['user-data']['id'];
 $subjects = "SELECT subjects.id, subjects.name, subjects.duration, "
     . "(SELECT COUNT(*) FROM exam_questions WHERE subjects.id = exam_questions.subject_id) as questions_count "
     . "FROM subjects WHERE EXISTS (SELECT id FROM exam_questions WHERE subjects.id = exam_questions.subject_id) "
     . "ORDER BY subjects.name ASC";
 $result = mysqli_query($conn, $subjects);
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
            <table class="table">
                    <thead >
                        <tr>
                            <th colspan="2" class="table_title"> <p class="registered">Exams </p></th>
                        </tr>
                    </thead>
                    <tr class="table_head">
                        <th class="table_head">Exam name</th>
                        <th class="table_head">No of Questions</th>
                    </tr>
                    <tr align="center" class="details" >
                        <?php 
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>
                        <td class="details"><?php echo $row['name']; ?></td>
                        <td class="details"><?php echo $row['questions_count']; ?></td>
                        <td class="details">
                            <button class="submited"><a href="studentresults.php?subject_id=<?php echo $row['id'] ?>">view</a></button>
                        </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>