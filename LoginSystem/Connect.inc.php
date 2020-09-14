<?php
  $server   = 'localhost';
  $user     = 'root';
  $password = '';
  $database  = 'net_banking';
  $flag = false;

  if($con = mysqli_connect($server,$user,$password)){
	  if(mysqli_select_db($con,$database)){
		  $flag = true;
	  }
  }
  if(!$flag){
	 die( mysql_error());
  }
?>