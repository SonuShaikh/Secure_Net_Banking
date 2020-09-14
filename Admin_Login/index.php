<!DOCTYPE>
<html>
<head>
     <title>Admin Login</title>
	 <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
    <?php include 'header.php'; ?>
	<div id="center">
		<form Action="index.php" Method="POST">
		  <label>Login type:</label><select name="type"><option></option><option value="Admin">Admin</option><option>Employee</option></select> <br/><br/>
		  <label>UserName:</label><input type="text" id="username" name="username"/><br/><br/>
		  <label>Password:</label><input type="password" id="password" name="password"/>  
         	 <input type="submit" value="Login" id="login"/>
		</form>
	</div>
	<?php //include 'footer.php';?>
</body>
</html>
<?php
    ob_start();
	
    require '../LoginSystem/Connect.inc.php';
	require 'Core.inc.php';
	
     if(isset($_POST['username'],$_POST['password'],$_POST['type'])){
		 $username = $_POST['username'];
		 $password = $_POST['password'];
		 $type     = $_POST['type'];
		 if(!empty($username) && !empty($password) && !empty($type)){
			 if($type == 'Admin'){
				 $query = "SELECT `id` FROM `admin_login` WHERE `user_name`='".mysqli_real_escape_string($con,$username)."' AND `password`='".mysqli_real_escape_string($con,$password)."'";
			 if($query_result = mysqli_query($con,$query)){
				 $num_rows = mysqli_num_rows($query_result);
				 if($num_rows == 0){
					 echo 'Wrong Username/Password Combination.';
				 }elseif($num_rows == 1){
					 $_SESSION['user_Id'] = mysqli_data_seek($query_result,0);
					 header('Location: Menu.php');
				 }
			 }else{
				 echo mysqli_error($con);
			 }
			 }else if($type == 'Employee'){
				$query = "SELECT `emp_id` FROM `employee` WHERE `email`='".mysqli_real_escape_string($con,$username)."' AND `phone_number`=".mysqli_real_escape_string($con,$password)."";
			 if($query_result = mysqli_query($con,$query)){
				 $num_rows = mysqli_num_rows($query_result);
				 if($num_rows == 0){
					 echo 'Wrong Employee_name/Password Combination.';
				 }elseif($num_rows == 1){
					$_SESSION['user_Id'] = mysqli_data_seek($query_result,0);
					 header('Location: Emp_menu.php');
			    }
			 } 
			}
		 }else{
			 echo 'Fill IN all Fields';
		 }
	 }		 
?>