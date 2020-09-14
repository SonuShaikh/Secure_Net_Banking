<?php
 
 ob_start();
 session_start();
 if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
	  $http_referer = $_SERVER['HTTP_REFERER'];
  }
 $scriptname = $_SERVER['SCRIPT_NAME'];
 function loggedin(){
	 if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		 return true;
	 } else{
		return false;
	 }
 }
 
 
 function getField($field_name){
	 $con = mysqli_connect('localhost','root',''); 
	 $query = "SELECT `".$field_name."` FROM `Login_table` WHERE `id`='".$_SESSION['user_id']."'";
	 if($query_run = mysqli_query($con,$query)){
		 //if($query_result = mysql_result($query_run,0,$field_name)){
		 if($query_result = mysqli_data_seek($query_run,0)){
			 return $query_result;
		 }
	 }
 }
?>