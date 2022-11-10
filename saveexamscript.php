<?php

require_once 'studentsession.php'; 
require_once 'dbcontroller.php';

$data = $_POST['data'];
if (!isset($data)) {
    die('No data found');
}

$subjectId = $_POST['subject_id'];
if (!isset($subjectId) || empty($subjectId)) {
    die("No subject found");
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

$saveScore = "UPDATE student_subject SET score=(SELECT SUM(IF(student_answers.exam_question_option_id = exam_questions.answer_id, 1, 0)) as score FROM student_answers INNER JOIN exam_questions ON exam_questions.id = student_answers.exam_question_id AND exam_questions.subject_id = {$subjectId}) "
    . "WHERE subject_id={$subjectId} AND student_id={$student_id}";
$scoreResult = mysqli_query($conn, $saveScore);

header("location:studentexam.php");
// SELECT SUM(IF(student_answers.exam_question_option_id = exam_questions.answer_id, 1, 0)) FROM student_answers INNER JOIN exam_questions ON exam_questions.id = student_answers.exam_question_id;