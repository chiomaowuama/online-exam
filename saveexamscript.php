<?php

require_once 'env.php';
require_once 'studentsession.php'; 
require_once 'dbcontroller.php';

// for maailing
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


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

if($scoreResult) {
    if (ENVIRONMENT === 'production') {
        $sql1 = mysqli_query($conn, "select * from candidates where id =  {$student_id} ");
        $sql1_array = mysqli_fetch_assoc($sql1);
        $sql2 = mysqli_query($conn, "select * from student_subject where student_id =  {$student_id} ");
        $sql2_array = mysqli_fetch_assoc($sql2);

        $email = $sql1_array['email'];
        $sname = $sql1_array['sname'];
        $fname = $sql1_array['firstname'];
        $score = $sql2_array['score'];

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;   //TO RECEIVE ERROR MESSAGE. YOU CAN COMMENT IT AFTER CODE IS WORKING PROPERLY
            $mail->isSMTP();
            $mail->Host = MAIL_HOST;    //THIS SHOULD BE YOUR DOMAIN NAME
            $mail->SMTPAuth = true;    
            $mail->Username = MAIL_USERNAME;  //THIS SHOULD BE THE EMAIL YOU CREATED ON YOUR CPANEL
            $mail->Password = MAIL_PASSWORD;    //PASSWORD FOR THE EMAIL YOU CREATED ON YOUR CPANEL
            $mail->SMTPSecure = MAIL_TLS;
            $mail->Port = MAIL_PORT;

            $mail->setFrom(MAIL_FROM);    //YOUR DOMAIN EMAIL WHICH WOULD BE USED TO SEND AND RECEIVE EMAILS

            $mail->addAddress($email);  //RECIPIENT ADDRESS, CAN BE HARD CODED.

            $mail->isHTML(true);

            $mail->Subject = "New Horizon Maternity Hospital- New Patient.";    //SUBJECT OF THE EMAIL

            //THESE ALLOWS THE EMAIL TO APPEAR IN HTML WITH STYLING FORMAT
            $mail->Headers = array(
                "MIME-Version" => "1.0",
                "Content-Type" => "text/html;charset=UTF-8"
            );

            // THIS GETS THE EXTERNALLY DESIGNED EMAIL MESSAGE
            $mail->Body = file_get_contents("message.php");

            // THIS IS TO GET THE INFORMATION WE WANT TO CHANGE ON THE MESSAGE PAGE AND SWAP THEM WITH THE ONES WE HAVE
            $swap_var = array(
                "{student_id}" => "$student_id",
                "{firstname}" => "$fname",
                "{surname}" => "$sname",
                "{score}" => "$score"
            );

            foreach(array_keys($swap_var) as $key){
                if (strlen($key) > 2 && trim($key) != ""){
                    $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                }
            }

            //TO SEND THE EMAIL
            $mail->send();

            echo
            "
                <script>
                alert('sent');
                </script>
            ";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    header("location:studentexam.php");
}

// SELECT SUM(IF(student_answers.exam_question_option_id = exam_questions.answer_id, 1, 0)) FROM student_answers INNER JOIN exam_questions ON exam_questions.id = student_answers.exam_question_id;