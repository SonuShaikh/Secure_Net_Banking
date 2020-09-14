<?php
 require '../LoginSystem/Connect.inc.php';
 require 'RegisterData.php';
 
  function Bank_Account_Number_Generator(){
	  return $account_number = Rand(111111111,99999999);
  }
  function Bank_Cif_Number_Generator(){
	  return $Cif_number     = Rand(1111111,9999999);
  }
  function Capcha_Number_Generator(){
	  return  $capcha        = Rand(111111,999999);
	  
  }
  
	  $account_number = Rand(111111111,99999999);
      $Cif_number     = Rand(1111111,9999999);
      $captcha        = Rand(111111,999999);
	  $password       = Rand(111111,999999);
	  $password_hash  = md5($password);
	  $id   = $_SESSION['userid'];
	  $city = $_SESSION['city'];
	  $mobile_nu = $_SESSION['mobile'];
	  $email    = $_SESSION['email'];
	  
	  
   if(!empty($account_number) && !empty($Cif_number) && !empty($captcha) && !empty($id) && !empty($city) && !empty($mobile_nu)){
	   $acc_query = "SELECT * FROM `account_info` WHERE `Acc_no`='".mysqli_real_escape_string($con,$account_number)."'";
	   if($acc_result = mysqli_query($con,$acc_query)){
		    $acc_row = mysqli_num_rows($acc_result);
		   if($acc_row == 0 ){
			   $cif_query = "SELECT * FROM `account_info` WHERE `Cif_no`='".mysqli_real_escape_string($con,$Cif_number)."'";
			   if($cif_result = mysqli_query($con,$cif_query)){
				   $cif_row = mysqli_num_rows($cif_result);
				   if($cif_row == 0){
					 $query_capcha = "SELECT `captcha` FROM `account_info` WHERE `captcha`= '$captcha'";
					 if($capcha_result = mysqli_query($con,$query_capcha)){
						 $capcha_row = mysqli_num_rows($capcha_result);
						 if($capcha_row == 0){ 
							$branch_code = "SELECT `branch_code` FROM `branch_details` WHERE `City`= '$city'";
							if($code_result = mysqli_query($con,$branch_code)){
								//$branch_code_result = mysql_result($code_result,0,'branch_code');
								$branch_code_result = mysqli_data_seek($code_result,0);
								$query_update ="UPDATE `account_info` SET `Acc_no` = $account_number, `Cif_no`= $Cif_number,`Branch_no` = $branch_code_result, `mobile` = $mobile_nu, `rights` = 'NULL', `captcha` = $captcha WHERE `Id` = $id";
									 if(mysqli_query($con,$query_update)){
											$query = "INSERT INTO `Login_table` VALUES($id,'$email','$password_hash','Not Active')";
											if(mysqli_query($con,$query)){
$to = $email;
$subject = 'New Account Details.';
$body = "
  Thank You for registering at secure net banking.
  These all information we have provide you is related to you Bank account
  for further transaction  and to use secure net banking account, you need these information,
  It also Required to active you secure net banking account.
  Your Information is as Follows;
  Bank Account Number = $account_number 
  CIF Number          = $Cif_number 
  Branch_code         = $branch_code_result
  Mobile Number       = $mobile_nu
  Tempary password    = $password
  confirmation Number = $captcha
  Logged in your Secure net banking Account using register email address and above password.
  And Fill These Information In You profile to activited account;
	";
$header = 'From: Secure Net Banking<shaikhshahabaj987@gmail>';
											if(mail($to,$subject,$body,$header)){
												echo 'Mail Has Been Send Successfuly';
												session_destroy();
											}else{
												$query = "DELETE FROM `Login_table` WHERE `Id` = $id";
												if(mysqli_query($con,$query)){
													echo 'An Error Occure While Sending Mail.<br/> Dont Leave a page Try Again and Again untill mail is send';
												}else{
													echo mysqli_error($con);
												} 
											}
											}else{
												echo mysqli_error($con);
											}
					
										
									 }else{
										 echo 'Update Account '.mysqli_error($con);
									 }  
							}else{
								echo 'Branch Code '.mysqli_error($con);
							}
					       
						 }else{
							$capcha = Capcha_Number_Generator();						
						 }
					 }else{
						 echo 'Capcha '.mysqli_error($con);
					 }
				   }else{
					 $account_number = Bank_Cif_Number_Generator();					 					  
				   }
			   }else{
				   echo 'Select Account Cif num '.mysqli_error($con);
			   }
		   }else{
			  $account_number = Bank_Account_Number_Generator();  
		   }
	   }else{
		   echo 'Select Account '. mysqli_error($con);
	   }
   }else{
	   echo 'Not Set';
   }
  
?>