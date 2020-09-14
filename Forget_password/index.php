<!DOCTYPE html>
<html>
<head>
      <meta charset='utf-8'/>
      <title>Forget Password</title>
	  <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
   <?php include 'header.php'; ?>
 <div id="header">
       
 </div>
     <div id="center">
		  <form action="ForgetPassword1.php" Method="POST">
		         <label class="label">Enter Register Email Address:</label> <br/><br/>
				 <input type="text" name="email" id="email" /> <br/><br/>
				 <input type="button" value="Submit" id="btn1" class="btn"/>
	      </form>
	 </div>
	 
	 <div id="confirm">
	        
	     <label id='confirm_label'> Confirmation Code :</label>
	     <input type="password" id="confirm_text" />
		 <input type="button" value="confirm" id="btn2" class="btn"/>
	 </div>
	 
	 <div id="newpassword">
	      <label class="pass_label">New Password :</label> <input type="password" id="new_pass"/> <br/><br/>
	      <label class="pass_label">Confirm Password :</label> <input type="password" id="con_pass"/> <br/><br/>
		  <input type="button" value="Change" id="btn3" class="btn"/>
		  
	 </div>
	   
	   <span id="span1"></span>
	  <div id='update'>Your Password Has Been Updated. Try <a href="../LoginSystem/index.php">Login</a></div>
	 <script type="text/javascript" src="jQuery/jquery.js"></script>
	 <script type="text/javascript" src="jQuery/forget.js"></script>
</body>
</html>
