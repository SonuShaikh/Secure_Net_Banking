<?php
   ob_start();
   session_start();
   function Loggin(){
	   if(isset($_SESSION['user_Id']) && !empty($_SESSION['user_Id'])){
		   return true;
	   }else{
		   return false;
	   }
   }
?>