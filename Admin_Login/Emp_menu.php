<!DOCTYPE>
<html>
<head>
 <!--<image src="../Images/services-banner-image1.jpg" width="1350px" height="650px" style="position:absolute"/>-->
     <title>Employe Menu</title>
	 <link rel="stylesheet" href="css/menu.css"/>
	 <link rel="stylesheet" href="css/emp_menu.css"/>
</head>
<body>
       
  <header>
        <?php include 'header.php'; ?>
        
  </header>
  <div id="menu">
    <ul>
     <li><a href="#" id='li1'>Loan Application</a></span></li>
     <li><a href="#" id='li2'>Loan Deposition</a></li>
     <li><a href="#" id='li3'>Closing Acc</a></li>
     <li><a href="#" id='li4'>Transaction</a></li>
     <li><a href="#" id='li5'>Customer Report</a></li>
  </ul>
  </div>
    <div id="welcome">
	    <p>
		   Welcome to Secure Net Banking.
		   Online Bank System Provide persone banking services that you one step solution
		   for your all banking needs
		</p>
	</div>
  <div id="Loan_apps">
    <label>Custerm Name </label><input type="text" id="name" class="text" /> <br/><br/>
     <label>Account_num</label>  <input type="text" id="accno" class="text" /><br/><br/>
     <label>Branch_name</label>  <input type="text" id="branch_name" class="text" /><br/><br/>
     <label>Loan type</label> <select id="loan_a"><option></option><option value="Conventional Loan">Conventional Loan</option><option value="Conforming Loan">Conforming Loan</option><option value="Non Conforming Loan">Non Conforming Loan</option></select> <br/><br/>
     <label>Loan Start date</label> <input type="text" id="Loanstartdate" class="text" /> <br/><br/>
	 <label>Loan Amount </label> <input type="text" id="loanamount" class="text" /><br/><br/>
     <label>Interest Rate</label> <input type="text" id="rate" class="text" /><br/><br/>
     <label>EMI Amount </label><input type="text" id="emi" class="text" /> <br/><br/>
     <label>Interest Amount</label> <input type="text" id="interestamount" class="text" /><br/><br/>
     <label>Total Amount </label> <input type="text" id="totalamount" class="text" /><br/><br/>
	  <input type="button" value = "Apply" id="loan_apply_btn" /> <br/> <br/>
  </div>
  
  
  <div id="Loan_deposit">
    <label>Account Number </label><input type="text" id="accno_d" class="text" /> <br/><br/>
     <label>Loan type</label> <select id="loan_t"><option></option><option value="Conventional Load">Conventional Load</option><option value="Conforming Loan">Conforming Loan</option><option value="Non Conforming Loan">Non Conforming Loan</option></select> <br/><br/>
     <label>EMI Amount </label><input type="text" id="emi_d" class="text" /> <br/><br/>
	 <label>Date</label> <input type="text" id="Loanstartdate_d" class="text" /> <br/><br/>
	  <input type="button" value = "Pay" id="pay_btn" /> <br/> <br/>
  </div>
  
  <div id="close_account">
    <label>Custerm Name </label><input type="text" id="cust_name" class="text" /> <br/><br/>
     <label>Account_num</label>  <input type="text" id="cust_accno" class="text" /><br/><br/>
     <label>Branch Code</label>  <input type="text" id="branch_code" class="text" /><br/><br/>
     <label>Account Type</label><select id="acctype">
	     <option ></option>
	     <option value="saving account (with checkbook)">saving account (with checkbook)</option>
	     <option value="Saving Account(withoght checkbook)">Saving Account(withoght checkbook)</option>
	     <option value="No-Fill">No-frill Account</option>
	     <option value="Premium Saving Account">Premium Saving Account</option>
	     <option value="Current Account">Current Account</option>
	 </select><br/><br/>
	  <input type="button" value = "Close Account" id="Close" /> <br/> <br/>
  </div>
  
  <div id="Trans_money">
    <label>Account Number: </label><input type="text" id="src_acc_no" class="text" /> <br/><br/>
    <label>Custumer Name</label><input type="text" id="custname" class="text" /> <br/><br/>
	 <label>Destination Acc No </label><input type="text" id="dest_acc_no" class="text" /> <br/><br/>
	 <label>Amount</label> <input type="text" id="Amount" class="text" /> <br/><br/>
	 <label>Transaction Type</label>
	 <select id="tras_type">
	    <option></option>
	    <option value="Deposit">Deposit</option>
		<option value="Withdraw">Withdraw</option>
		<option value="Transfer">Transfer</option>
	</select> <br/></br/>
	  <input type="button" value = "Proceed" id="deposit_btn" />
  </div>
  
  <div id="cust_report">
      <label>Account Number</label> <input type="text" id="search_id" size = "10"class="text"/> <input type="button" value="Search" id="cust_search"/>
   </div>

  <span id= 'span2'></span>
  <?php //include 'footer.php';?>
	 <script type="text/javascript" src = "../LoginSystem/jQuery/jquery.js"></script>
     <script type="text/javascript" src = "jQuery/emp_menu.js"></script>
</body>
</html>