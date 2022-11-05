<?php
	require_once("dbcontroller.php");
	
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
                header("location:success.php");
                // echo "congratulation candidate registration is succesful. "."Click here to return to <a href='index.php'> Home </a>";

                
                // $userquery="select id,firstname,sname,photo from candidates where id=".mysqli_insert_id($conn);

                // if (!$result=mysqli_query($conn,$userquery)) 
                // {
                //     die('could not execute'.mysql_error($conn));
                // }
                // var_dump(mysqli_fetch_row($result));

                $Regno = "ExAm".mysqli_insert_id($conn);
                echo $Regno ;


            };
        };
    };
 mysqli_close($conn);
?>