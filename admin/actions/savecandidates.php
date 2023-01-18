<?php
    require_once 'enviroment.php';
    require_once __DIR__  . '/../includes/session.php'; 
    require_once __DIR__  . '/../includes/db.php';
    
    
    $db_handle = new DBController();
    $conn = $db_handle->connectDB();
     
    //  // for maailing
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;
        
      require_once '../phpmailer/src/Exception.php';
     require_once '../phpmailer/src/PHPMailer.php';
     require_once '../phpmailer/src/SMTP.php';
	
	// Test Database Connection
	if (!$conn)
  	{
  		die('Could not connect to Database');
  	}
    else{
        $firstname = $_POST['fname'];
        $sname = $_POST['sname'];
        $phoneno = $_POST['phoneno'];
        $gender = $_POST['gender'];
        $nation = $_POST['nation'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Rpass = $_POST['rpass'];
        if(!isset($firstname) || !isset($sname)|| !isset($phoneno) || !isset($gender) || !isset($nation) || !isset($email)|| !isset($password)|| !isset($Rpass))
        {
            die(" all fields are required ");
        }
        if($password != $Rpass){
            die("passwords not similar ");
        }
       
        // get image from form

        if(($_FILES['myprofilephoto']['name']!=""))
        {
            $target_dir="images/passport/";
            $target_sub_dir="passport";

            $file = $_FILES['myprofilephoto']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];


            $temp_name = $_FILES['myprofilephoto']['tmp_name'];

            $path_filename_ext = $target_dir . $filename . "." . $ext;
            // $path_filename_ext2 = $target_sub_dir . $filename . "." . $ext;

            // check if file already exists

            if(file_exists($path_filename_ext))
            {
                echo "this file already exixt ,"." click here to try again.<a href='index.php'> Home </a>";
            }
            else
            {
                move_uploaded_file($temp_name,$path_filename_ext);

                // prepare sql querry
                $strInsert = "insert into candidates(firstname,sname,phoneno,gender,nationality,email,password,Rpass,photo) values('$firstname', '$sname', '$phoneno',  '$gender','$nation','$email', '$password', '$Rpass','$path_filename_ext')";

                if (!$result=mysqli_query($conn,$strInsert)) 
                {
                    die('could not connect:check SQL insert querry'.mysql_error($conn));
                }
                // header("location: ../studentsuccess.php");
                // echo "congratulation candidate registration is succesful. "."Click here to return to <a href='index.php'> Home </a>";

                
                $userquery="select id,firstname,sname,photo from candidates where id=".mysqli_insert_id($conn);

                if (!$result=mysqli_query($conn,$userquery)) 
                {
                    die('could not execute'.mysql_error($conn));
                }
               

                $Regno = "ExAm".mysqli_insert_id($conn);
                //  echo $Regno ;
                // header("location: ../studentsuccess.php");
                
                 if (ENVIRONMENT === 'production') {

                    $mail = new PHPMailer(true);
            
                    try {
                        $mail->SMTPDebug = 0;   //TO RECEIVE ERROR MESSAGE. YOU CAN COMMENT IT AFTER CODE IS WORKING PROPERLY
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
            
                        $mail->Subject = "National WEb Board- Registration details .";    //SUBJECT OF THE EMAIL
            
                        //THESE ALLOWS THE EMAIL TO APPEAR IN HTML WITH STYLING FORMAT
                        $mail->Headers = array(
                            "MIME-Version" => "1.0",
                            "Content-Type" => "text/html;charset=UTF-8"
                        );
            
                        // THIS GETS THE EXTERNALLY DESIGNED EMAIL MESSAGE
                        $mail->Body = file_get_contents("sendmessages.php");
            
                        // THIS IS TO GET THE INFORMATION WE WANT TO CHANGE ON THE MESSAGE PAGE AND SWAP THEM WITH THE ONES WE HAVE
                        $swap_var = array(
                            "{reg_no}" => "$Regno",
                            "{firstname}" => "$firstname",
                            "{surname}" => "$sname",
                            "{password}" => "$password"
                        );
            
                        foreach(array_keys($swap_var) as $key){
                            if (strlen($key) > 2 && trim($key) != ""){
                                $mail->Body = str_replace($key, $swap_var[$key], $mail->Body);
                            }
                        }
            
                        //TO SEND THE EMAIL
                        $mail->send();
            
                        // header("location:../studentsuccess.php");
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }

                    header("location:../studentsuccess.php");
                    
                
                   
                }
        
                
                
            };
        };
    };

    // mysqli_close($conn);
?>