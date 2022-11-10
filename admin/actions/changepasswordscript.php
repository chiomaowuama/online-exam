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
            $adminid= $_SESSION["admin"]["adminid"];
            $query = mysqli_query($conn,"SELECT COUNT(*) FROM adminlogin WHERE password = '$oldp' AND adminid = '$adminid' ");

            if(mysqli_num_rows($query) > 0 ){
                $con = mysqli_query($conn,"UPDATE adminlogin set password = '$newp', rpass = '$Rnew' where  adminid = '$adminid' ");
                header("location:../newhomeadmin.php");
            }
            else{
                die("old password not correct");
            }
        }
    }
?>