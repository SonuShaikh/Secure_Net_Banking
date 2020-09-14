<?php
  require '../LoginSystem/Connect.inc.php';
  require 'Core.inc.php';
  
 
  if(isset($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['add'],$_POST['gender'],$_POST['Dob'],$_POST['edu'],$_POST['desig'],$_POST['branch'],$_POST['joiningdate'])){
	 $name  = $_POST['name'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $add   = $_POST['add'];
	 $gender= $_POST['gender'];
	 $Dob   = $_POST['Dob'];
	 $edu   = $_POST['edu'];
	 $desig = $_POST['desig'];
	 $branch_name = $_POST['branch'];
	 $joindate = $_POST['joiningdate'];
	 $m_leng = strlen($phone);
	 if($m_leng == 10){
		 if(!empty($name) && !empty($email) && !empty($phone) && !empty($add) && !empty($gender) && !empty($Dob) && !empty($edu) && !empty($desig) && !empty($branch_name) && !empty($joindate)){
		$query = "INSERT INTO `employee`( `name`, `email`, `phone_number`, `address`, `gender`, `DOB`, `qualification`, `designation`, `branch_name`, `dateOfJoining`) VALUES('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$email)."',".mysqli_real_escape_string($con,$phone).",'".mysqli_real_escape_string($con,$add)."','".mysqli_real_escape_string($con,$gender)."','".mysqli_real_escape_string($con,$Dob)."','".mysqli_real_escape_string($con,$edu)."','".mysqli_real_escape_string($con,$desig)."','".mysqli_real_escape_string($con,$branch_name)."','".mysqli_real_escape_string($con,$joindate)."')";
	    if(mysqli_query($con,$query)){
			echo 'Successfuly New Employee Added.';
		}else{
			echo mysqli_error($con);
		}
	 }else{
		 echo 'Fill in All Fiedls';
	 }
	 }else{
		 echo 'Phone number should be 10 digit.';
	 }
	  
  }
     if(isset($_POST['id'])){
		 $selectempid = $_POST['id'];
		 if(!empty($selectempid)){
			 $query = "SELECT `name`, `email` ,`phone_number` , `branch_name` FROM `employee` WHERE `emp_id`= ".mysqli_real_escape_string($con,$selectempid)."";
			 if($query_result = mysqli_query($con,$query)){
				 $num_rows = mysqli_num_rows($query_result);
				 if($num_rows == 0){
					 echo 'Invalid Employee id';
				 }else if($num_rows == 1){
					 $employee = mysqli_fetch_assoc($query_result);
					 $name = $employee['name'];
					 $email = $employee['email'];
					 $phone = $employee['phone_number'];
					 $branch = $employee['branch_name'];
					 
					 
					 
			        echo "<form action='menudata.php' method='post'>";
					   echo "Name:<input type='text' name='name' value ='$name'>";
			           echo "Email:<input type='text' name='email' value ='$email'> <br/><br/>";
			           echo "Phone:<input type='text' name='phone' value ='$phone'>";
			           echo "Branch:<input type='text' name='phone' value ='$branch'>";
					echo "</form>";
				 }
			 }else{
				 echo mysqli_error($con);
			 }
		 }else{
			 echo 'Enter Employee Id';
		 }
	 }
  if(isset($_POST['bname'],$_POST['bemail'],$_POST['badd'],$_POST['bcity'],$_POST['bcode'],$_POST['pincode'],$_POST['tphone'])){
	  $name  = $_POST['bname'];
	  $email = $_POST['bemail'];
	  $add   = $_POST['badd'];
	  $city  = $_POST['bcity'];
	  $code  = $_POST['bcode'];
	  $pincode = $_POST['pincode'];
	  $tphone = $_POST['tphone'];
	  
	  if(!empty($name)&&!empty($email)&&!empty($add)&&!empty($city)&&!empty($code)&&!empty($pincode)&&!empty($tphone)){
		  $query = "INSERT INTO `branch_details` (`branch_name`, `email`, `address`, `City`, `branch_code`, `pin_code`, `telephone`) VALUES('".mysqli_real_escape_string($con,$name)."','".mysqli_real_escape_string($con,$email)."','".mysqli_real_escape_string($con,$add)."','".mysqli_real_escape_string($con,$city)."',".mysqli_real_escape_string($con,$code).",".mysqli_real_escape_string($con,$pincode).",".mysqli_real_escape_string($con,$tphone).")";
		  if(mysqli_query($con,$query)){
			  echo 'Branch Added Successfuly.';
		  }else{
			  echo mysqli_error($con);
		  }
	  }else{
		  echo 'Fill In All Fields';
	  }
  }
 
  if(isset($_POST['name'],$_POST['emp_id'],$_POST['emp_name'])){
	  $branch_name = $_POST['name'];
	  $emp_id      = $_POST['emp_id'];
	  $emp_name    = $_POST['emp_name'];
	  if(!empty($branch_name) && !empty($emp_id) && !empty($emp_name)){
		  $query = "SELECT `branch_name` FROM `branch_details` WHERE `branch_name`= '".mysqli_real_escape_string($con,$branch_name)."'";
		  if($query_result = mysqli_query($con,$query)){
			  $num_rows = mysqli_num_rows($query_result);
			  if( $num_rows == 0){
				  echo 'Invalid Bank Branch Name';
			  }else if ($num_rows == 1){
				  $query = "SELECT `emp_id`,`name` FROM `employee` WHERE `emp_id` = ".$emp_id."";
				  if($query_result = mysqli_query($con,$query)){
					  $num_rows = mysqli_num_rows($query_result);
                      if($num_rows == 0){
						  echo 'Invalid Employee Id';
					  }else{
						  $result = mysqli_data_seek($query_result,0);
						  if($emp_name == $result){
							 $query = "UPDATE `branch_details` SET `emp_id`=".mysqli_real_escape_string($con,$emp_id).",`Manager_name`='".mysqli_real_escape_string($con,$result)."' WHERE `branch_name`='".mysqli_real_escape_string($con,$branch_name)."'";
							 if(mysqli_query($con,$query)){
								 echo $emp_name.' Is Allocated At '.$branch_name.' As Bank Manager';
							 }else{
								 echo mysqli_error($con);
							 }
						  }else{
							  echo 'Employee Name doesn\'t match with specified id';
						  }
					  }					  
				  }else{
					  echo mysqli_error($con);
				  }
			  }
		  }else{
			  echo mysqli_error($con);
		  }
	  }else{
		  echo 'Fill In all Fields';
	  }
  }
  
  if(isset($_POST['name'],$_POST['accno'],$_POST['branch'],$_POST['loant'],$_POST['ldate'],$_POST['lamount'],$_POST['rate'],$_POST['emi'],$_POST['itramnt'],$_POST['total'])){
	  $cust_name  =  $_POST['name'];
	  $account_num =  $_POST['accno'];
	  $branch     =  $_POST['branch'];
	  $loan_type  =  $_POST['loant'];
	  $loan_date  =  $_POST['ldate'];
	  $loan_amount =  $_POST['lamount'];
	  $loan_rate  =  $_POST['rate'];
	  $emi_amount =  $_POST['emi'];
	  $interest_a =  $_POST['itramnt'];
	  $total_amount = $_POST['total'];
	  
	  if(!empty($cust_name) && !empty($account_num) && !empty($branch) && !empty($loan_type) && !empty($loan_date) && !empty($loan_amount) && !empty($loan_rate) && !empty($emi_amount) && !empty($interest_a) && !empty($total_amount)){
		$query = "SELECT `Acc_no` FROM `account_info` WHERE `Acc_no` = ".mysqli_real_escape_string($con,$account_num)."";
		if($query_result = mysqli_query($con,$query)){
			$num_rows = mysqli_num_rows($query_result);
			if($num_rows == 1){
				$query = "SELECT `total_amount` FROM `loan_tbl` WHERE `acc_num`=".mysqli_real_escape_string($con,$account_num)."";
				if($query_result = mysqli_query($con,$query)){
				  $num_rows = mysqli_num_rows($query_result);
				  if($num_rows == 0){
					  $query = "INSERT INTO `loan_tbl`( `cust_name`, `acc_num`, `loan_type`, `loan_start`, `loan_amount`, `Interest_rate`, `emi_amount`, `interest_amount`, `total_amount`) VALUE('".mysqli_real_escape_string($con,$cust_name)."',".mysqli_real_escape_string($con,$account_num).",'".mysqli_real_escape_string($con,$loan_type)."','".mysqli_real_escape_string($con,$loan_date)."',".mysqli_real_escape_string($con,$loan_amount).",".mysqli_real_escape_string($con,$loan_rate).",".mysqli_real_escape_string($con,$emi_amount).",".mysqli_real_escape_string($con,$interest_a).",".mysqli_real_escape_string($con,$total_amount).")";
							if(mysqli_query($con,$query)){
								echo 'Your Request for loan has been Accepted.';
							}else{
								echo mysqli_error($con);
						}
				  }else{
					  echo 'You have already taken Loan';
				  }			       
				}else{
					mysqli_error($con);
				}
				 /*  */
			}else{
				echo 'Wrong Account number';
			}
		}else{
			echo mysqli_error($con);
		}
	  }else{
		  echo 'Fill In All Fields';
	  }
  }
  
  if(isset($_POST['account'],$_POST['l_type'],$_POST['emi_amount'],$_POST['date'])){
	  $account_num = $_POST['account'];
	  $loan_type = $_POST['l_type'];
	  $emi_amount = $_POST['emi_amount'];
	  $date      = $_POST['date'];
	  if(!empty($account_num)&&!empty($loan_type)&&!empty($emi_amount)&&!empty($date)){
		  $query = "SELECT `loan_id`,`total_amount` FROM `loan_tbl` WHERE `acc_num`=".mysqli_real_escape_string($con,$account_num)."";
		  if($query_result = mysqli_query($con,$query)){
			  $num_rows = mysqli_num_rows($query_result);
			  if($num_rows == 0){
				  echo 'YOu dont have take a loan';
			  }else{
				  $result = mysql_fetch_assoc($query_result);
				  $loan_id = $result['loan_id'];
				  $total_amount = $result['total_amount'];
				  if($total_amount <= 0){
					  echo 'You have paid your loan';
				  }else{
					 $total_amount -=$emi_amount;
					  $query = "UPDATE `loan_tbl` SET `total_amount`=$total_amount WHERE `loan_id`= $loan_id";
					  if(mysqli_query($con,$query)){
						 $query = "INSERT INTO `loan_deposite` VALUE($loan_id,".mysqli_real_escape_string($con,$account_num).",'".mysqli_real_escape_string($con,$date)."',".mysqli_real_escape_string($con,$emi_amount).")";
						 if(mysqli_query($con,$query)){
							 if($total_amount<= 0){
								 echo 'Thank You..! Your Loan has been Cleared.';
							 }else{
								 echo 'Thank You..! You still have to paid '.$total_amount.' Rupees.';
							 }
						 }else{
							 mysqli_error($con);
						 }
					  }else{
						  echo mysqli_error($con);
					  }
				}
			  }
		  }else{
			  echo mysqli_error($con);
		  }
	  }else{
		  echo 'Fill In All Fields';
	  }
  }
 
  if(isset($_POST['name'],$_POST['accno'],$_POST['acctype'],$_POST['branch_code'])){
	  $cust_name = $_POST['name'];
	  $cust_account_nu = $_POST['accno'];
	  $branch_code = $_POST['branch_code'];
	  $account_type = $_POST['acctype'];
	  if(!empty($cust_name)&&!empty($cust_account_nu)&&!empty($account_type) && !empty($branch_code)){
		  $query = "SELECT `Id` FROM `account_info` WHERE `Acc_no`=".mysqli_real_escape_string($con,$cust_account_nu)."";
		 if($query_result = mysqli_query($con,$query)){
			$num_rows = mysqli_num_rows($query_result);
			if($num_rows == 1){
				$cust_id = mysql_result($query_result,0,'Id');
			 $query = "SELECT `first_name`,`Acc_no`,`Account_type`,`Branch_no` FROM `register_user` ru, `account_info` ai WHERE ru.Id = ai.Id AND ru.id =".$cust_id."";
			 if($query_result = mysqli_query($con,$query)){
				 $num_rows = mysqli_num_rows($query_result);
				 
					 $result = mysql_fetch_assoc($query_result);
					 $first_name = $result['first_name'];
					 $account_nu = $result['Acc_no'];
					 $acc_type = $result['Account_type'];
					 $branch_no = $result['Branch_no'];
					 if($first_name == $cust_name){
						 if($branch_no ==$branch_code){
							 if($acc_type == $account_type){
								$query = "SELECT `total_amount` FROM `loan_tbl` WHERE `acc_num`=$cust_account_nu";
								if($query_result = mysqli_query($con,$query)){
									$num_rows = mysqli_num_rows($query_result);
									if($num_rows >= 1){
										$total_amount = mysql_result($query_result,0,'total_amount');
										 if($total_amount <= 0){
											$query = "UPDATE `login_table` SET `Account_Status`='Closed' WHERE `Id` =".$cust_id."";
											if(mysqli_query($con,$query)){
												echo 'Your Accont Closed Successfuly.';
											}else{
												echo mysqli_error($con);
											}
										}else{
											echo 'You have Taken Loan From Bank. First Cleare It.';
										}
									}
								}else{
									echo mysqli_error($con);
								}
							 }else{
								 echo 'Invalid Account Type';
							 }
						 }else{
							 echo 'Invalid Branch Name';
						 }
					 }else{
						 echo 'Invalid name';
					 }
				 
			 }else{
				 echo mysqli_error($con);
			 }
			}else{
				echo 'Invalid Account Number';
			}
		 }else{
			 echo mysqli_error($con);
		 }
		 
	  }else{
		  echo 'Fill In All Fields';
	  }
}
  
 
if(isset($_POST['source_acc'],$_POST['cust_name'],$_POST['dest_acc'],$_POST['amount'],$_POST['operation'])){
	 $source_accno = $_POST['source_acc'];
	 $cust_name    = $_POST['cust_name'];
	 $dest_acc    = $_POST['dest_acc'];
	 $deposite_amount = $_POST['amount'];
	 $operation    = $_POST['operation'];
	 
	 
	 $manager_id = $_SESSION['user_Id'];
    if(isset($manager_id) && !empty($manager_id)){
	  $query = "SELECT `balance` FROM `branch_balance` WHERE `emp_id` =$manager_id";
	  if($query_result = mysqli_query($con,$query)){
		  $num_rows = mysqli_num_rows($query_result);
          if($num_rows == 1){
			  $bank_balance = mysql_result($query_result,0,'balance');
		  }else{
			  $bank_balance = 0;
		  }  
	  }
	}
	 
	 
	 
	 if(!empty($source_accno)&&!empty($cust_name)&& !empty($dest_acc) && !empty($deposite_amount)&& !empty($operation)){
		$query = "SELECT `Id` FROM `account_info` WHERE `Acc_no`=".mysqli_real_escape_string($con,$source_accno)."";
		if($query_result = mysqli_query($con,$query)){
			$num_rows = mysqli_num_rows($query_result);
			if($num_rows == 0){
				echo 'Invalid Account Number';
			}else if($num_rows == 1){
				$Id = mysql_result($query_result,0,'Id');
				$query = "SELECT `first_name` FROM `register_user` WHERE `Id` = $Id";
				if($query_result = mysqli_query($con,$query)){
					$name = mysql_result($query_result,0,'first_name');
					if($name == $cust_name){
					   $query = "SELECT `Balance` FROM `cust_balance` WHERE `Id` = ".$Id." AND `Account_number` =".mysqli_real_escape_string($con,$source_accno)."";
					   if($query_result = mysqli_query($con,$query)){
						   $num_rows = mysqli_num_rows($query_result);
						   if($num_rows == 1){
							   $balance = mysql_result($query_result,0,'Balance');
							   if($operation == 'Deposit'){
								    deposite($bank_balance,$balance,$deposite_amount,$manager_id,$Id,$source_accno);
								    
							   }else if($operation == 'Withdraw'){
								    if($balance >= $deposite_amount){
										Withdraw($bank_balance,$balance,$deposite_amount,$manager_id,$Id,$source_accno);
									}else{
										echo 'Customer Dont have that much of money.';
									}									
							   }else if($operation == 'Transfer'){
								   echo 'This Module is under construction';
								   // Tranfer data
								   /* $query = "SELECT `Id` FROM `account_info` WHERE `Acc_no` = ".mysqli_real_escape_string($con,$dest_acc)."";
								   if($query_result = mysqli_query($con,$query)){
									   $num_rows = mysqli_num_rows($query_result);
									   if($num_rows == 1){
										   $dest_id = mysql_result($query_result,0,'Id');
										   $query = "SELECT `Balance` FROM `cust_balance` WHERE `Id`=".$dest_id."";
										   if($query_result = mysqli_query($con,$query)){
											   $num_rows = mysqli_num_rows($query_result);
											   if($num_rows == 1){
												    $dest_balance =  mysql_result($query_result,0,'Balance');
												   if($balance > $deposite_amount){
													   
												   }else{
													   echo 'You Dont have That much of balance to complete this transaction.';
												   }
											   }else{
												   echo 'Update your Transaction Rights.';
											   }
										   }else{
											   echo mysqli_error($con);
										   }
									   }else{
										   echo 'Invalid Destination Account Number';
									   }
								   }else{
									   echo mysqli_error($con);
								   } */
								  // Transfer data
							   }
								
						   }else{
							   echo 'You dont have permision to to any transaction';
						   }
					   }else{
						   echo 'Error 2'.mysqli_error($con);
					   }
					}else{
						echo 'Invalid Name';
					}
				}else{
					echo mysqli_error($con);
				}
			}
		}else{
			echo mysqli_error($con);
		}
	}else{
		echo 'Fill In All Fields';
	}
}

     if(isset($_POST['cust_id'])){
		 $custemer_acc_no = $_POST['cust_id'];
		 if(!empty($custemer_acc_no)){
			 $query = "SELECT `Id` FROM `account_info` WHERE `Acc_no` = ".mysqli_real_escape_string($con,$custemer_acc_no)."";
			 if($query_result = mysqli_query($con,$query)){
				 $num_rows = mysqli_num_rows($query_result);
				 if($num_rows == 1){
					 $custemer_id = mysql_result($query_result,0,'Id');
					 $query = "SELECT `first_name`,`DOB`,`gender`,`Address`,`city`,`mobile_number`,`email`,`Acc_no`,`Cif_no`,`branch_no`,`Account_type`,`Atm_card`,`Mobile_banking` FROM `register_user` RU,`account_info` AI WHERE RU.Id = AI.Id AND RU.Id = ".$custemer_id."";
			 if($query_result = mysqli_query($con,$query)){
				 $num_rows = mysqli_num_rows($query_result);
				 if($num_rows == 0){
					 echo 'Invalid Customer Id';
				 }else if($num_rows == 1){
					$c = mysql_fetch_assoc($query_result);
					$acc_no =$c['Acc_no'];					
					$name = $c['first_name'];$dob  = $c['DOB'];	$gen  = $c['gender'];
					$add  = $c['Address'];$city = $c['city'];$mobile =$c['mobile_number'];
					$email = $c['email'];$cif_no = $c['Cif_no'];
					$branch_code = $c['branch_no'];	$acc_type = $c['Account_type'];
					$atm = $c['Atm_card'];$mb =$c['Mobile_banking'];
					$query = "SELECT `Balance`, `loan_id`,`loan_type`, `loan_start`,`loan_amount`,`total_amount` FROM `cust_balance` CB ,`loan_tbl` LT WHERE CB.Account_number = LT.acc_num AND CB.Account_number = $acc_no";
					if($query_result2 = mysqli_query($con,$query)){
						$num_rows = mysqli_num_rows($query_result2);
						if($num_rows != 0){
							$c2 = mysql_fetch_assoc($query_result2);
							$bal = $c2['Balance']; $loan_id= $c2['loan_id'];$loan_type = $c2['loan_type'];
							$l_start =$c2['loan_start'];$l_amount = $c2['loan_amount']; $total = $c2['total_amount'];
							if($total == 0){
								$total = 'Loan Paid';
							}
						}
					}else{
						echo mysqli_error($con);
					}
					 echo "
					  Name:          <input type='text' value='$name'/>  Date of birth: <input type='text' value='$dob'/>
					  Gender:        <input type='text' value='$gen'/>   Address:       <input type='text' value='$add' size='30'/>
					  City:<input type='text' value='$city' /> <br/> <br/>Mobile No:<input type='text' value='$mobile' size = ''/> 
					  Email:<input type='text' value='$email'/> Account No:<input type='text' value='$acc_no'/>CIF No:<input type='text' value='$cif_no' size = ''/>
					  Branch Code:<input type='text' value='$branch_code'/> <br/><br/> Account Type:<input type='text' value='$acc_type' size = ''/> 
					  ATM Card:<input type='text' value='$atm'/>Mobile Banking:<input type='text' value='$mb'/> Bank Balance:<input type='text' value='$bal'/> 
					  <br/><br/> ";
					  if(isset($bal,$loan_id,$loan_type,$l_start,$l_amount,$total)){
						  echo "
					  Loan Details <br/><br/>
					  Loan Id:<input type='text' value='$loan_id'/> Loan Type: <input type='text' value='$loan_type'/>
					  Loan Start Date <input type='text' value='$l_start'/> Loan Amount:<input type='text' value='$l_amount'/>
					  Remain Amount:<input type='text' value='$total'/>
						"; 
					  }
				 }
			 }else{
				 echo mysqli_error($con);
			 }
					 
				 }else{
					 echo 'Invalid Account Number';
				 }
			 }else{
				 echo mysqli_error($con);
			 }
		 }else{
			 echo 'Enter Customer Bank Account';
		 }
	 }
?>

<?php
   // bank class 
  
     class bank{
	   
	   public function __construct($host_id,$db_user,$db_password,$database){
		   if(!$this->connection($host_id,$db_user,$db_password)){
			   echo 'Not connected';
		   }else if($this->connection($host_id,$db_user,$db_password)){
			   if(!$this->database_con($database)){
				   echo 'Database Could Not Found.';
			   }else if($this->database_con($database)){
				   
			   }
		   }
	   }
	   //connect to database
	   private function connection($host_id,$db_user,$db_password){
		   if(!mysql_connect($host_id,$db_user,$db_password)){
			   return false;
		   }else if(mysql_connect($host_id,$db_user,$db_password)){
			   return true;
		   }
	   }	  

        public function database_con($database){
			if(mysql_select_db($database)){
				return true;
			}else{
				return false;
			}
		}
		
	   public $main_balance;
	   public function main_balance($main_balance){
		   $this->main_balance = $main_balance;
		   //echo $this->main_balance;
	   }
	   // check at the time of deposite
	   private function main_balance_check_deposite($money,$manager_id){
		   if($this->main_balance < $money){
			   return 0;
		   }else if($this->main_balance > $money){
			 $new_balance  = $this->main_balance -= $money;
			 $this->update_bank_balance($new_balance,$manager_id);
			 return $new_balance;
		   }else{
			   return 0;
		   }
	   }
	   
	   // check at the time of widthdra
	   private function main_balance_check_withdraw($money,$manager_id){
			 $new_balance  = $this->main_balance += $money;
			 $this->update_bank_balance($new_balance,$manager_id);
			 return $new_balance;
	   }
	   
	  private function update_bank_balance($new_balance,$manager_id){
		   $query = "update `branch_balance` SET `balance`=".$new_balance." WHERE `emp_id`=".$manager_id."";
		   if(!mysqli_query($con,$query)){
			   echo mysqli_error($con);
		   }
	   }
	   
	   private function update_cust_balance($balance,$id,$cust_accno){
		$query = "UPDATE `cust_balance` SET `Balance`=".$balance." WHERE `Id` =".$id." And `Account_number` =".mysqli_real_escape_string($con,$cust_accno)."";
			if(mysqli_query($con,$query)){
				 echo 'Transaction Successful';
		    }else{
				  echo mysqli_error($con);
		 }   
	   }
	   
	   public function deposite($balance,$amount,$manager_id,$cust_id,$cust_accno){
		    $bal_chek = $this->main_balance_check_deposite($amount,$manager_id);
			if($bal_chek == 0){
				echo 'Bank running out of cash';
			}else{
				 $balance += $amount;
				 $this->update_cust_balance($balance,$cust_id,$cust_accno);
			}			
	   }
	   
	   public function withdraw($balance,$amount,$manager_id,$cust_id,$cust_accno){
		    $bal_chek = $this->main_balance_check_withdraw($amount,$manager_id);
			if($bal_chek == 0){
				echo 'Bank running out of cash';
			}else{
				 $balance -= $amount;
				$this->update_cust_balance($balance,$cust_id,$cust_accno);
			}			
	   }   
	   
   }
   
   function deposite($bank_balance,$balance,$amount,$manager_id,$cust_id,$cust_accno){
	       $obj = new bank('localhost','root','','net_banking');
		   $obj->main_balance($bank_balance);
	       $obj->deposite($balance,$amount,$manager_id,$cust_id,$cust_accno);	 
 }


  function Withdraw($bank_balance,$balance,$amount,$manager_id,$cust_id,$cust_accno){
	       $obj = new bank('localhost','root','','net_banking');
		   $obj->main_balance($bank_balance);
	       $obj->withdraw($balance,$amount,$manager_id,$cust_id,$cust_accno);
 } 
?>