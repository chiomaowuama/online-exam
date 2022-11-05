<?php

require_once 'studentsession.php'; 
require_once 'dbcontroller.php';

$data = $_POST['data'];
if (!isset($data)) {
    die('No data found');
}

$student_id = $_SESSION['user-data']['id'];

$query = "INSERT INTO student_answers(student_id, exam_question_id, exam_question_option_id) VALUES ";

$i = 0;
foreach ($data as $question_id => $option_id) { 
    if (++$i === count($data)) {
        $query .= "($student_id, $question_id, $option_id)";
        continue;
    }

    $query .= "($student_id, $question_id, $option_id), ";
}

$db_handle = new DBController();
$conn = $db_handle->connectDB();

$result = mysqli_query($conn, $query);

header("location:studentexam.php");
// SELECT SUM(IF(student_answers.exam_question_option_id = exam_questions.answer_id, 1, 0)) FROM student_answers INNER JOIN exam_questions ON exam_questions.id = student_answers.exam_question_id;