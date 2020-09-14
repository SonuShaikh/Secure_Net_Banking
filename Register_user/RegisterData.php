<?php
  require '../LoginSystem/Connect.inc.php';
  session_start();
 
  if(isset($_POST['cust_type'],$_POST['cust_age'],$_POST['title1'],$_POST['last'],$_POST['first'],$_POST['middle'],$_POST['title2'],$_POST['f_last'],$_POST['f_first'],$_POST['f_middle'],$_POST['dob'],$_POST['cust_gen'],$_POST['nation'],$_POST['marrage_status'],$_POST['coradd'],$_POST['landmark'],$_POST['state'],$_POST['city'],$_POST['pincode'],$_POST['mobileno'],$_POST['telephone'],$_POST['email'],$_POST['edu'])){
	 $custemer_type = $_POST['cust_type'];
	 $custemer_age  = $_POST['cust_age'];
	 $title1        = $_POST['title1'];
	 $last_name     = $_POST['last'];
	 $first_name    = $_POST['first'];
	 $middle_name   = $_POST['middle'];
	 $title2        = $_POST['title2'];
	 $f_last_name   = $_POST['f_last'];
	 $f_first_name  = $_POST['f_first'];
	 $f_middle_name = $_POST['f_middle'];
	 $dateOfBirth   = $_POST['dob'];
	 $gender        = $_POST['cust_gen'];
	 $nationality   = $_POST['nation'];
	 $marrage_Stat  = $_POST['marrage_status'];
	 $address       = $_POST['coradd'];
	 $landmark      = $_POST['landmark'];
	 $state         = $_POST['state'];
	 $city          = $_POST['city'];
	 $pincode       = $_POST['pincode'];
	 $mobile_number = $_POST['mobileno'];
	 $telephone     = $_POST['telephone'];
	 $email         = $_POST['email'];
	 $edu_stat      = $_POST['edu'];
	 $query = "INSERT INTO `register_user`( `cust_type`, `cust_age`, `title`, `last_name`, `first_name`, `middle_name`, `DOB`, `gender`, `nationality`, `address`, `landmark`, `state`, `city`, `pincode`, `mobile_number`, `telephone_number`, `email`, `education`) VALUES ('".mysqli_real_escape_string($con,$custemer_type)."', '".mysqli_real_escape_string($con,$custemer_age)."', '".mysqli_real_escape_string($con,$title1)."', '".mysqli_real_escape_string($con,$last_name)."', '".mysqli_real_escape_string($con,$first_name)."', '".mysqli_real_escape_string($con,$middle_name)."', '".mysqli_real_escape_string($con,$dateOfBirth)."', '".mysqli_real_escape_string($con,$gender)."', '.".mysqli_real_escape_string($con,$nationality)."', '".mysqli_real_escape_string($con,$address)."', '".mysqli_real_escape_string($con,$landmark)."', '".mysqli_real_escape_string($con,$state)."', '".mysqli_real_escape_string($con,$city)."',".mysqli_real_escape_string($con,$pincode).",".mysqli_real_escape_string($con,$mobile_number).",".mysqli_real_escape_string($con,$telephone).",'".mysqli_real_escape_string($con,$email)."', '". mysqli_real_escape_string($con,$edu_stat)."')";
	if(mysqli_query($con,$query)){
		$query = "SELECT `Id` FROM `register_user` WHERE `email`='".mysqli_real_escape_string($con,$email)."'";
		if($query_result = mysqli_query($con,$query)){
			//$result = mysql_result($query_result,0,'Id');
			$result = mysqli_data_seek($query_result,0);
			$query_parent = "INSERT INTO `parent_details` VALUES(".mysqli_real_escape_string($con,$result).",'".mysqli_real_escape_string($con,$title2)."','".mysqli_real_escape_string($con,$f_last_name)."','".mysqli_real_escape_string($con,$f_first_name)."','".mysqli_real_escape_string($con,$f_middle_name)."')";
			if(mysqli_query($con,$query_parent)){
				echo 'First stage is successfully completed. Click next to complete the from';
				$_SESSION['userid'] = $result;
				$_SESSION['email']  = $email;
                $_SESSION['mobile'] = $mobile_number;
                $_SESSION['city']	= $city;	
			}else{
				echo mysqli_error($con);
			}
		}else{
			echo mysqli_error($con);
		}
	}else{
		echo mysqli_error($con);
	}
   }
?>

<?php
   if(isset($_POST['type_acc'],$_POST['Mobile_banking'],$_POST['atm'],$_POST['sms'],$_POST['checkbook_type'])){
	    $id = $_SESSION['userid'];
		//echo 'User id is '+ $id;
	    $account_type   = $_POST['type_acc'];
	    $mobile_banking = $_POST['Mobile_banking'];
		$Atm            = $_POST['atm'];
	    $sms_alert      = $_POST['sms'];
	    $checkbook      = $_POST['checkbook_type'];
       $query = "INSERT INTO `account_info`(`Id`,`Account_type`,`Atm_card`, `Mobile_banking`, `Sms_alert`, `Checkbook`) VALUES(".$id.",'".$account_type."','".$Atm."','".$mobile_banking."','".$sms_alert."','".$checkbook."')";
	   if(mysqli_query($con,$query)){
		     header('Location: Creating_Account_number.php');
	   }else{
		   echo mysqli_error($con);
	   }
   }
?>