<?php
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
		   echo $this->main_balance;
	   }
	   // check at the time of deposite
	   private function main_balance_check_deposite($money){
		   if($this->main_balance < $money){
			   return 0;
		   }else{
			 $new_balance  = $this->main_balance -= $money;
			 $this->update_bank_balance($new_balance);
			 return $new_balance;
		   }
	   }
	   
	   // check at the time of widthdra
	   private function main_balance_check_withdraw($money){
		   if($this->main_balance < $money){
			   return 0;
		   }else{
			 $new_balance  = $this->main_balance += $money;
			 $this->update_bank_balance($new_balance);
			 return $new_balance;
		   }
	   }
	   
	  private function update_bank_balance($new_balance){
		   $query = "update `branch_balance` SET `balance`=".$new_balance." WHERE `emp_id`=1";
		   if(mysql_query($query)){
			   echo 'Updeted';
		   }else{
			   echo mysql_error();
		   }
	   }
	   
	   public function deposite($balance,$amount){
		    $bal_chek = $this->main_balance_check_deposite($amount);
			if($bal_chek == 0){
				echo 'Bank running out of cash';
			}else{
				echo $balance += $amount;
			}			
	   }
	   
	   public function withdraw($balance,$amount){
		    $bal_chek = $this->main_balance_check_withdraw($amount);
			if($bal_chek == 0){
				echo 'Bank running out of cash';
			}else{
				echo $balance -= $amount;
			}			
	   }   
	   
   }
   
			$main_balance_out = 2000;
		   function main_balance($bank_balance){
			   return $bank_balance;
		   }
   main_balance($main_balance_out);
   
   function deposite($balance_amt,$deposite_amt){
	      $bank_balance = main_balance_display();
	       $obj = new bank('localhost','root','','net_banking');
		   $obj->main_balance($bank_balance);
	       $obj->deposite($balance_amt,$deposite_amt);	 
 }
 
 deposite(1000,100);

  function Withdraw($balance_amt,$deposite_amt){
	       $obj = new bank('localhost','root','','net_banking');
		   $obj->main_balance(1000);
	       $obj->withdraw($balance_amt,$deposite_amt);
 } 
 
?>