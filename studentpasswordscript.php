<?php
    require_once 'studentsession.php'; 
    require_once 'dbcontroller.php';
        
	
	$db_handle = new DBController();
	$conn = $db_handle->connectDB();
	
	// Test Database Connection
	if (!$conn)
  	{
  		die('Could not connect to Database');
  	}
    else{
        $oldp = $_POST['oldpassword'];
        $newp = $_POST['newpassword'];
        $Rnew = $_POST['Rnewpassword'];

        if(!isset($oldp)|| !isset($newp)||!isset($Rnew)){
            echo "all field are required ";
        }
        if($newp != $Rnew){
            die("passwords not similar ");
        }
        else{
            $studentid= $_SESSION["user-data"]["id"];
            $query = mysqli_query($conn,"SELECT COUNT(*) FROM candidates WHERE password = '$oldp' AND id = '$studentid' ");

            if(mysqli_num_rows($query) > 0 ){
                $con = mysqli_query($conn,"UPDATE candidates set password = '$newp', Rpass = '$Rnew' where  id = '$studentid' ");
                header("location:studentprofile.php");
            }
            else{
                die("old password not correct");
            }
        }
    }
?>