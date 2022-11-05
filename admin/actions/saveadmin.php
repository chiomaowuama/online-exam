<?php
    require_once __DIR__  . '/../includes/session.php'; 
    require_once __DIR__  . '/../includes/db.php';
      
	
	$db_handle = new DBController();
	$conn = $db_handle->connectDB();
	
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
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Rpass = $_POST['rpass'];
        if(!isset($firstname) || !isset($sname)|| !isset($phoneno) || !isset($gender) || !isset($username) || !isset($email)|| !isset($password)|| !isset($Rpass))
        {
            die(" all fields are required ");
        }
        if($password != $Rpass){
            die("passwords not similar ");
        }
       
        // get image from form

        if(($_FILES['mgtpassport']['name']!=""))
        {
            $target_dir="images/adminpassport/";
            $target_sub_dir="adminpassport";

            $file = $_FILES['mgtpassport']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];


            $temp_name = $_FILES['mgtpassport']['tmp_name'];

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
                $strInsert = "insert into adminlogin(firstname,sname,phoneno,gender,username,email,password,Rpass,photo) values('$firstname', '$sname', '$phoneno',  '$gender','$username','$email', '$password', '$Rpass','$path_filename_ext')";

                if (!$result=mysqli_query($conn,$strInsert)) 
                {
                    die('could not connect:check SQL insert querry'.mysql_error($conn));
                }
                header("location: ../adminsuccess.php");
            };
        };
    };
 mysqli_close($conn);
?>