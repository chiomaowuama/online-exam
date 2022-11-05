<?php 

require_once __DIR__  . '/includes/session.php'; 
require_once __DIR__  . '/includes/db.php';

$selectedSubjectId = isset($_GET['subject_id']) ? $_GET['subject_id'] : '';

$subjects = mysqli_query($conn, "SELECT `id`, `name` FROM subjects");

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
        <div class="otherside">
            <?php include './includes/fixedhead.php';?>
            
            <!-- body -->
            <div class="subject1">
                <div class="subject2">
                    <form action="actions/savequestion.php" method="post">
                        <label for="subject">Select Subject</label>
                        <select name="subject_id" id="subjects" required>
                            <option value="" class="select_subject">Select a subject</option>
                            <?php
                                while ($subject = mysqli_fetch_assoc($subjects)) {
                                    echo "<option value='{$subject['id']}'" . ($selectedSubjectId == $subject['id'] ? 'selected' : '') . ">
                                        {$subject['name']}
                                    </option>";
                                }
                                mysqli_free_result($subjects);
                            ?>
                        </select>

                        <label for="questions">Question</label>
                        <input type="text" class="question1" name="question" required>

                        <div class="adjust">
                            <div class="options">
                                <input type="radio" name="answer" class="checked" value="option1" required>
                                <input type="text" class="answers" name="option1" required>
                            </div>
                            <div class="options">
                                <input type="radio" name="answer" class="checked" value="option2" required>
                                <input type="text" class="answers" name="option2" required>
                            </div>
                            <div class="options">
                                <input type="radio" name="answer" class="checked" value="option3" required>
                                <input type="text" class="answers" name="option3" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="questionbtns">Save Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
