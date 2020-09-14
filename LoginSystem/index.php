<?php
 
 require 'Core.inc.php';
 require 'Connect.inc.php';
 
   if(loggedin()){
	   $bank_status = getField('Account_Status');
	   if($bank_status == "Not Active"){
		   header('Location: ConfirmAccount.php');
	   }else if($bank_status = "Closed"){
		   echo 'Your Account has been Closed. To Active it Contact Administrator.';
		   echo '<a href="Logout.php">Logout</a>';
	   }else{
		   echo ' You\'re Logged in successfuly. <a href="Logout.php">Logout</a>';
	   }
		   
	   
   }else{
	   require 'LoginForm.php';
   }
   if(@$http_referer == 'http://localhost/secure_net_banking/Forget_password/newpassword.php'){
		   echo 'Your password has been successfuly Changed';
	   }
?>