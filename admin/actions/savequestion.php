<?php
    require_once __DIR__  . '/../includes/session.php'; 
    require_once __DIR__  . '/../includes/db.php';
    
    $subjectId = $_POST['subject_id'];
    
    // validate that subject_id is present
    if(!isset($subjectId) && empty($subjectId)){
        die("the subject is required");
    }

    // validate that the subject is in the database
    $validateSubject = mysqli_query($conn, "SELECT id FROM subjects WHERE `id`={$subjectId}");
    if (mysqli_num_rows($validateSubject) < 1) {
        die('the subject does not exist');
    }

    // collect the question
    $question = $_POST['question'];

    // validate that question is present
    if(!isset($question) && empty($question)){
        die("the question is required");
    }

    // collect the options
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];

    // validate that all 3 options are present
    if(
        (!isset($option1) && empty($option1)) ||
        (!isset($option2) && empty($option2)) ||
        (!isset($option3) && empty($option3))
    ) {
        die("all options are required");
    }

    // collect the answer
    $answer = $_POST['answer'];
    if (!isset($answer) && empty($answer)) {
        die("choose an answer");
    }

    $answer = $$answer; // $'option1' == $option1

    // save the question
    $saveQuestion = mysqli_query($conn, "INSERT INTO exam_questions(subject_id, question) VALUES('{$subjectId}', '{$question}')");
    $questionId = mysqli_insert_id($conn);

    // save the options
    $saveOptions = mysqli_query($conn, "INSERT INTO exam_question_options(question_option, exam_question_id) VALUES('{$option1}', '{$questionId}'), ('{$option2}', '{$questionId}'), ('{$option3}', '{$questionId}');");
    
    // get the answer's ID from the newly created options
    $answerResult = mysqli_query($conn, "SELECT id FROM exam_question_options WHERE `exam_question_id`='{$questionId}' AND `question_option`='{$answer}'");
    $answerId = mysqli_fetch_assoc($answerResult)['id'];

    // update the question with the answer's ID
    $questionAnswer = mysqli_query($conn, "UPDATE exam_questions SET answer_id='{$answerId}' WHERE `id`='{$questionId}'");
    
    header("location: ../addquestion.php");
?>