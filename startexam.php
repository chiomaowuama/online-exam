<?php
    require_once 'studentsession.php'; 
    require_once 'dbcontroller.php';

    $db_handle = new DBController();
    $conn = $db_handle->connectDB();

    $student_id = $_SESSION['user-data']['id'];
    $subjectid = $_GET['subject_id'];

    if(!isset($subjectid)){
        header('location:studentexam.php ');
    }
   

    $subjects ="SELECT exam_questions.id,exam_questions.question,subjects.name FROM exam_questions INNER JOIN subjects ON exam_questions.subject_id = subjects.id WHERE exam_questions.subject_id = $subjectid";
    $result = mysqli_query($conn,$subjects);
    $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    
    if(count($rows)< 1){
        die("Ther is no ongoing Exam for this subject please try again later");
        header('location:studentprofile.php ');
        
    }
    $subjectname = $rows[0]['name'];
    
    try {
        $studentsubject = "INSERT INTO student_subject(student_id,subject_id) VALUES ($student_id, $subjectid)";
        $studentresult = mysqli_query($conn,$studentsubject);
    }
    catch (\Exception $e) {
        die("You have taken this exam already");
    }
   
    $questionIds = array_map(function ($row) {
        return $row['id'];
    }, $rows);
    $questionIdstring = implode(',', $questionIds);
    $optionsQuery = "SELECT * FROM exam_question_options WHERE exam_question_id IN ($questionIdstring)";
    $optionsResult = mysqli_query($conn,$optionsQuery);
    $options = mysqli_fetch_all($optionsResult,MYSQLI_ASSOC);
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
         
            <div class="subject_student">
                <div class="name_time" >
                    <div><?php  echo $subjectname; ?></div>
                    <div id="countdown"></div>
                </div>
                <form action="saveexamscript.php" method="POST">
                    <?php
                    foreach ($rows as $row) {
                        echo '
                        <input type="hidden" name="data['.$row['id'].']" value="' . $row['id'] . '">

                        <div class="questions_display">
                            <div class="questions">
                                <p>' . $row["question"] . '</p>
                            </div>
                            <div class="options_answers">';
                                $questionOptions = array_filter($options, function($option) use ($row) {
                                    return $option['exam_question_id'] == $row['id'];
                                });
                                foreach ($questionOptions as $option) {
                                    echo '
                                    <div class="options">
                                        <input type="radio" name="data['.$row['id'].']" class="checked" value="' . $option['id'] . '" required>
                                        <p>'.$option["question_option"].'</p>
                                    </div>
                                    ';
                                }
                            echo '</div>
                        </div>
                        ';
                    }
                    ?>

                    <button type="submit">Submit</button>
                </form>
                
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>