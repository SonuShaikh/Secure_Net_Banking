<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>UpdatePassword</title>
  <link rel='stylesheet' href='css/updatepassword.css'/>
</head>
<body>
	<div id="password">
		<form Action="UpdatePassword.php" Method="POST">
		   <label>Current Password:</label> <input type="password" name="current_pass" id="current_pass" /> <br/><br/>
		   <label>New Password:</label>     <input type="password" name="new_password" id="new_password" />  <br/><br/>
		   <label>Confirm Password:</label> <input type="password" name="confirm_pass" id="confirm_pass" />  <br/><br/>
		   <input type="submit" value="Confirm Password" id="submit">
		</form> 
		 <span id="span1"></span>
	</div>
	<script type="text/javascript" src="jQuery/jquery.js"></script>
	<script type="text/javascript" src="jQuery/updatepassword.js"></script>
</body>
</html>
<?php
   require 'Core.inc.php';
   require 'Connect.inc.php';
   if(isset($_POST['current_pass'],$_POST['new_password'],$_POST['confirm_pass'])){
	   $current_pass = md5($_POST['current_pass']);
	   $new_password = $_POST['new_password'];
	   $confirm_pass = $_POST['confirm_pass'];
	   if(!empty($current_pass) && !empty($new_password) && !empty($confirm_pass)){
		   $id = $_SESSION['user_id'];
           $new_pass_len     = strlen($new_password);
           $confirm_pass_len = strlen($confirm_pass);
           if($new_pass_len >= 8 && $confirm_pass_len >= 8){
			   if($new_password == $confirm_pass){
				    $query = "SELECT `Password` FROM `Login_table` WHERE `Id`= ".$id;
					if($query_result = mysqli_query($con,$query)){
						$result = mysqli_data_seek($query_result,0);
						if($current_pass == $result){
							$password = md5($new_password);
							$query = "UPDATE `Login_table` SET `Password`='".$password."' WHERE `Id` = ".$id;
							if(mysqli_query($con,$query)){
								session_destroy();
								header('Location: Activited.php');
							}else{
								echo Mysql_error($con$con);
							}
						}else{
							echo 'You have typed Wrong Current Password';
						}
					}else{
						echo Mysql_error($con);
					}
			   }else{
				   echo 'Password Miss Matched';
			   }
		   }else{
			    echo 'Your Password Should Be greater than Equals 8 Charactors.';   
		   }	   
	   }else{
		   echo 'Fill In All Fields';
	   }
   }
?>