<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8"/>
    <title>LogIn Form</title>
	<link rel="stylesheet"  href="css/Loginform.css" />
	<link rel="stylesheet"  href="css/Loginform2.css" />
	
 </head>
 <body>
 
    <?php
     require 'Connect.inc.php'; 
	    if(isset($_POST['username'],$_POST['password'])){
			$uname = mysqli_real_escape_string($con,htmlentities($_POST['username']));
			$pass  = mysqli_real_escape_string($con,htmlentities($_POST['password']));
			$upass = md5($pass);
			 if(!empty($uname) And !empty($upass)){
				$query = "SELECT `id` FROM `Login_table` WHERE `email` = '$uname' AND `Password`= '$upass'";
				if($query_run = mysqli_query($con,$query)){
					$query_num_rows = mysqli_num_rows($query_run);
					if($query_num_rows == 0){
						echo "Invalid Username/Password Combination.";
					} else if($query_num_rows >= 1){
						$query_id = mysqli_data_seek($query_run,0);
						$_SESSION['user_id'] = $query_id;
						header('Location: index.php');
					}
				}else{
					echo mysql_error();
				}
			}else{
				echo 'Please Fill in All Fields.';
			} 
		}
   
   ?>
      <h3 id='h3'>Secuire Net Banking</h3>
    <div id='Login'>
	     <form action='<?php echo $scriptname; ?>' method='POST'>
		 <label id='label_uname'>UserName:</label><br/>
		    <input type='text' name='username' id='username' placeholder= 'Enter Your Email' size ='30'/> <br/>
		 <label id='label_pass'>Password</label><br/>
			<input type='password'  name='password' id='password' placeholder= 'Enter Your Password' size='30'/><br/>
			<label id='fpass'><a href='../Forget_password/index.php'>Forget Password</a></label><br/>
		    <input type='Submit' name='Submit' id='submit_btn' value='Login' /><br/>
			<label > --------------------------OR-------------------------- <label><br/>
			<label> <a href='../Register_user/Register.php' id='register'>CREATE AN ACCOUNT</a> </label>
		 </form>
	</div>
	   <div id='feedback'></div>
	  <img src ='../Images/Login.jpg' alt='Image' id='image' width="1350px" height="680px"/> 
	  <label id='lbl_dev'>Devloper :<span style="color:blue;">Sahil Shaikh</span></label>
	  <div id='devloper'>
	    <img id ='Sonu' src='../images/Sahil.jpg' alt="Sonu" /> 
	       
		<span id="Details">
		   <b>Sahil Shaikh</b> <br/><br/>
		   sahilshaikh9028@gmail.com <br/><br/>
		   +919975872833
	    </span>
		
	  </div>
	  <script type='text/javascript' src='jQuery/jquery.js'></script>
	  <script type='text/javascript' src='jQuery/LoginForm.js'></script>
 </body>
</html>