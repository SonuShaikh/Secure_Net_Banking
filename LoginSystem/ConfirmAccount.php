<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
	<title>Confirm Account</title>
	<link rel='stylesheet' href='css/Account.css'/>
  </head>
<body>
    <script type="text/javascript" src="jQuery/Account.js" ></script>
    <script type="text/javascript" src="jQuery/jquery.js" ></script>
 <div id='center'>
	   <header>
			 <marquee> 
			     Your Account have not been Active yet. Fill Corrcte Information
				 And Active your Secure net Banking Account. 
				 <span style="color:red">All Information We've provide on your register email address.</span>
			 </marquee>
			 <h1>Secure net Banking</h1>
	   </header>
	   <hr/>
	  <form action="ConfirmAccount.php" method="POST">
		<label>Account Number*</label>
		<input type='text' name='account_number'/> <br/><br/>
		<label>CIF Number*</label>
		<input type='text' name='cif_number'/> <br/><br/>
		<label>Branch Code*</label>
		<input type='text' name='branch_code'/> <br/><br/>
		<label>Country*</label>
		<select name='country'>
			<option>--Select Country--</option>
			<option value="India">India</option>
			<option value="America">America</option>
			<option value="Englad">Englad</option>
			<option value="Austroliya">Austroliya</option>
			<option value="Germany">Germeny</option>
		</select> <br/> <br/>
		<label>Register Mobile Number*</label>
		<input type='text' name='mobile'/> <br/><br/>
		<label>Faculty Required*</label>
		<select name='faculty'>
			<option>--Select Transation Rights--</option>
			<option value="Full Rights">Full Transation Rights</option>
			<option value="Limited Rights">Limited Transation Rights</option>
			<option value="View Rights">View Right</option>
		</select> <br/><br/>
		<label>Enter the text as show in the image</label>
		<input type="text" name="capcha" size="6"/><br/><br/>
		<input type="submit" value="Confirm" id="confirm"/>
	  </form>
  </div>
</body>
</html>

<?php
  require 'Connect.inc.php';
  require 'Core.inc.php';
   if(isset($_POST['account_number'],$_POST['cif_number'],$_POST['branch_code'],$_POST['country'],$_POST['mobile'],$_POST['faculty'],$_POST['capcha'])){
          $account_number = $_POST['account_number'];
		  $cif_number     = $_POST['cif_number'];
		  $branch_code    = $_POST['branch_code'];
		  $country        = $_POST['country'];
		  $mobile         = $_POST['mobile'];
		  $faculty        = $_POST['faculty'];
		  $capcha         = $_POST['capcha'];
    		
	   if(empty($account_number)){
			echo 'Enter Your Account Number';
		}elseif(empty($cif_number)){
			echo 'Enter Your CIF Number';
		}elseif(empty($branch_code)){
			echo 'Enter Your branch code';
		}elseif($country == '--Select Country--'){
			echo 'Select Your Country';
		}elseif(empty($mobile)){
			echo 'Enter Your Mobile Number';
		}elseif($faculty =='--Select Transation Rights--'){
			echo 'Select Transation Rights';
		} elseif(empty($capcha)){
			echo 'Fill Currect Captcha';
		}else{
			$query = "SELECT `Acc_no`,`Cif_no`,`Branch_no`,`mobile`,`captcha` FROM `account_info` WHERE `Id` = ".$_SESSION['user_id'];
			if($query_result = mysqli_query($con,$query)){
				$num_rows = mysqli_num_rows($query_result);
				if($num_rows == 1){
					 $fields = mysqli_fetch_assoc($query_result);
						$Acc_no = $fields['Acc_no'];
						$Cif_no = $fields['Cif_no'];
						$branch = $fields['Branch_no'];
						$Mobile = $fields['mobile'];
						$Capcha = $fields['captcha'];
				   if($Acc_no == $account_number && $Cif_no == $cif_number && $branch == $branch_code && $Mobile == $mobile && $Capcha == $capcha){
					  $query_update = "UPDATE `account_info` SET `rights`='".$faculty."' WHERE `Id`='".$_SESSION['user_id']."'";
						  if(mysqli_query($con,$query_update)){
							  if(mysqli_query($con,$query_update)){
							  $query_active_status = "UPDATE `login_table` SET `Account_Status`='Active' WHERE `Id`='".$_SESSION['user_id']."'";
							  if(mysqli_query(con,$query_active_status)){
								 header('Location: UpdatePassword.php');
							  }else{
								  echo mysqli_error($con);
							  }
						    }else{
							  echo mysqli_error($con);
						  }
						  }else{
							  echo mysqli_error($con);
						  }
				   }else{
					   echo 'You\'ve Entered Wrong Information.';
				   }	  				
				}
			}else{
				echo mysqli_error($con);
			}
		}
   }
?>