<?php
   require 'Core.inc.php';
   require 'Connect.inc.php';
   if(isset($_POST['current_pass'])){
	   $current_password = $_POST['current_pass'];
	   if(!empty($current_password)){
		   $query = "SELECT `Password` FROM `Login_table` WHERE `Id` = 36";
		   if($query_result = mysqli_query($con,$query)){
			   $result = mysqli_data_seek($query_result,0);
			   echo $result;
		   }else{
			   echo mysql_error();
		   }
	   }else{
		   echo 'Enter Your Password';
	   }
   }
?>