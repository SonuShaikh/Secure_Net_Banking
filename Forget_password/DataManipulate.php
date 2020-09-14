<?php
   require '../LoginSystem/Connect.inc.php';
   require '../LoginSystem/Core.inc.php';
   if(isset($_POST['email'])){
       $email = $_POST['email'];
	   if(!empty($email)){
		   $query = "SELECT `Id` FROM `Login_table` WHERE `email`= '".$email."'";
		   if($query_result = mysqli_query($con,$query)){
			   $num_rows = mysqli_num_rows($query_result);
			   if($num_rows == 0){
				   echo 'Invalid Email Address.';
			   }else if($num_rows >= 1){
				   $id  = mysqli_data_seek($query_result,0);
				   $_SESSION['user_id'] = $id;
				   $confirm_code = Rand(111111,999999);
				   $to = $email;
				   $subject = 'Forget Password.';
				   $body    = "Confirmation Code $confirm_code";
				   $header  = 'From:Secure Net Banking<shaikhshahabaj987@gmail.com>';
				   
				    $query = "SELECT `Id` FROM `Forget_password` WHERE `Id` = ".$id."";
					if($query_result = mysqli_query($con,$query)){
						$id_num_rows = mysqli_num_rows($query_result);
						if($id_num_rows == 0){
							$query = "INSERT INTO `Forget_password` VALUE(".$id.",".$confirm_code.")";
							if(mysqli_query($con,$query)){
								//echo 'Confirmation Code has been sent to your mail';
								 if(mail($to,$subject,$body,$header)){
									echo 'Confirmation Code has been sent to your mail';
								}else{
									echo 'Error In Sending Mail. Try Again.';
									session_destroy();
								} 
							}else{
								echo 'First Query '.mysqli_error($con);
							}
						}else{
							$query = "UPDATE `Forget_password` SET `Confirmation_code`= '".$confirm_code."' WHERE `Id` = ".$id." ";
							if(mysqli_query($con,$query)){
								//echo 'Confirmation Code has been sent to your mail';
								 if(mail($to,$subject,$body,$header)){
									echo 'Confirmation Code has been sent to your mail';
								}else{
									echo 'Error In Sending Mail. Try Again.';
									session_destroy();
								} 
							}else{
								echo 'Second Query '.mysqli_error($con);
							}
							
						}
					}else{
						echo mysqli_error($con);
					}
				   
			   }
		   }else{
			   echo mysqli_error($con);
		   }
	   }else{
		   echo 'Enter Email Address';
	   }
   }
   
   
   if(isset($_POST['code'])){
	    $code = $_POST['code'];
	   if(!empty($code)){
		   $query = "SELECT `Confirmation_code` FROM `forget_password` WHERE `Id`=".$_SESSION['user_id'];
		   if($query_result = mysqli_query($con,$query)){
			   $confirm_code = mysqli_data_seek($query_result,0);
			   if($confirm_code == $code){
				   echo 'Matched';
			   }else{
				   echo 'Miss Matched Code';
			   }
		   }else{
			   echo mysqli_error($con);
		   }
	   }else{
		   echo 'Enter Confirmation Code';
	   }
   }
   
   if(isset($_POST['newpass'],$_POST['conpass'])){
	   $newpass1 = $_POST['newpass'];
	   $newpass2 = $_POST['conpass'];
	 
	   if(!empty($newpass1) && !empty($newpass2)){
		   if(strlen($newpass1) >= 8){
			   $password = md5($newpass1);
			   $query = "UPDATE `Login_table` SET `Password` = '".$password."' WHERE `Id`=".$_SESSION['user_id'];
			   if(mysqli_query($con,$query)){
				   echo 'password updated';
				   session_destroy();
			   }else{
				   echo mysqli_error($con);
			   }
		   }else{
			   echo 'Password should be greate than Equals to 8 charectors.';
		   }
	   }else{
		   echo 'Fill In Both Fields';
	   }
   }
?>