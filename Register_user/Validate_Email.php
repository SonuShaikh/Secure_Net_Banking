<?php
		  $con = mysqli_connect('localhost','root','') or('host connection error');
		   mysqli_select_db($con,'net_banking') or die('database error');

     if(isset($_POST['email']) And !empty($_POST['email'])){
	   $email = $_POST['email'];
	   if(filter_var($email,FILTER_VALIDATE_EMAIL) == false){
		   echo 'That doesn\'t appear as valid email address.';
	   }else{
		   
		   $query = "SELECT `email` FROM `register_user` WHERE `email`='$email'";
		   if($query_result = mysqli_query($con,$query)){
			   $mysql_num_rows = mysqli_num_rows($query_result);
			   if($mysql_num_rows >= 1){
				   echo 'Email Allready Exist. Try Another One';
			   }else{
				   echo 'Valid Email';
			   }
		   }else{
			   echo mysql_error();
		   }
		   
	   }
   }
   if(isset($_POST['phone_num']) And !empty($_POST['phone_num'])){
	   $phone_no = $_POST['phone_num'];
	   $phonelength = strlen($phone_no);
	   if($phonelength == 10){
		   $query = "SELECT `mobile_number` FROM `register_user` WHERE `mobile_number`='$phone_no'";
	   if($query_run = mysqli_query($con,$query)){
		   $query_nums_rows = mysqli_num_rows($query_run);
		   if($query_nums_rows >= 1){
			   echo 'Phone Number is already exist';
		   }else{
			   echo 'Valid Number';
		   }
	   }else{
		   echo mysql_error();
	   }
	  }else{
		  echo 'Phone number Don\'t Exist.';
	  }
   }
   if(isset($_POST['pincode']) AND !empty($_POST['pincode'])){
	   $city = $_POST['pincode'];
	   $query = "SELECT `pin_code` FROM `branch_details` WHERE `City`='$city'";
	   if($query_result = mysqli_query($con,$query)){
		  $num_row = mysqli_num_rows($query_result);
		  if($num_row == 1){
			   $result = mysqli_data_seek($query_result,0);
				echo $result;
		  }else{
			  echo 'No Data Found';
		  }
	   }else{
		   echo mysql_error();
	   }
   }
?>