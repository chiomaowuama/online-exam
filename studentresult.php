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
                <div class="bigresult">
                    <table class="table"  >
                        <thead>
                            <tr>
                                <th colspan="4" class="table_title"> <p class="registered">VIEW RESULTS</p></th>
                            </tr>
                            <tr class="table_head">
                                <th class="table_head">Subject</th>
                                <th class="table_head">TOTAL</th>
                                <th class="table_head">GRADE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr align="center" class="details">
                            <?php
                                while($row = mysqli_fetch_assoc ($result))
                                {
                                ?>
                                <td class="details"><?php echo $row['name']; ?></td>
                                <td class="details">
                                    <?php 
                                        $score = $row['score'];

                                        echo !is_null($score) ? ($score . ' / ' . $row['questions_count']) : 'not taken';
                                    ?>
                                </td>
                                <td class="details">
                                    <?php
                                        try{
                                            if( is_null ($score) ){
                                                echo 'no score';

                                            }
                                            else{

                                                $percentage = ($score / $row['questions_count']) * 100;
                                                // echo $percentage;
                                                if($percentage >= 80){
                                                    echo '<div style="color:green; font-size:20px; font-weight:700;">A</div>';
                                                }
                                                elseif($percentage >= 60 && $percentage < 80){
                                                    echo '<div style="color:green-yellow; font-size:20px; font-weight:700;">B</div>';
                                                }
                                                elseif($percentage >= 50 && $percentage < 60){
                                                    echo '<div style="color:brown; font-size:20px; font-weight:700;">C</div>';
                                                }
                                                elseif($percentage >= 40 && $percentage < 50){
                                                    echo '<div style="color:orange; font-size:20px; font-weight:700;">D</div>';
                                                }
                                                else{
                                                    echo '<div style="color:red; font-size:20px; font-weight:700;">F</div>';
                                                }
                                            }
                                        }
                                        catch(DivisionByZeroError $e){
                                            echo 'grade shows here';
                                        }
                                    
                                        // grade shows here
                                    ?>
                                </td>
                                </tr>
                                <?php
                                }
                            ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
               
            </div>
        </div>
    </div>

</body>