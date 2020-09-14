<!DOCTYPE>
<html>
<head>
     <title>Admin Login</title>
	 <link rel="stylesheet" href="css/menu.css"/>
</head>
<body>
  <header>
       <?php include 'header.php'; ?>
  </header>
     <div id="welcome">
	    <p>
		   Welcome to Secure Net Banking.
		   Online Bank System Provide persone banking services that you one step solution
		   for your all banking needs
		</p>
	</div>
  <div id="menu">
    <ul>
     <li><a href="#" id='li1'>Add Employee</a></li>
     <li><a href="#" id='li2'>Manage Employee</a></li>
     <li><a href="#" id='li3'>Add Branch</a></li>
     <li><a href="#" id='li4'>Bank Manager</a></li>
     <li><a href="#" id='li5'>Emp Report</a></li>
  </ul>
  </div>
 
  <div id='Addemp'> 
    <h3 id="h3">Add New Employee</h3>
     <label>Employee Name </label><input type="text" id="name" class="text" /> <br/><br/>
     <label>Email</label>  <input type="text" id="email" class="text" /><br/><br/>
     <label>Phone Number</label>  <input type="text" id="phone" class="text" /><br/><br/>
     <label>Address</label> <input type="text" id="address" class="text" /> <br/><br/>
     <label>Gender </label> <select id="gender"><option></option><option value="Male">Male</option><option value="Female">Female</option></select> <br/><br/>
     <label>Date Of Birth </label> <input type="text" id="Dob" class="text" /><br/><br/>
     <label>Qualification </label> <input type="text" id="edu" class="text" /><br/><br/>
     <label>Designation </label><input type="text" id="desig" class="text" /> <br/><br/>
     <label>Branch Name </label> <input type="text" id="branch_name" class="text" /><br/><br/>
     <label>Date of Joining </label> <input type="text" id="joiningdate" class="text" /><br/><br/>
	  <input type="button" value = "Add" id="Add_emp_btn" /> <br/> <br/>
  </div>
  
  <div id="mang_emp">
        
	    <label>Employee Id:</label> <input type="text" id="search_txt"/><input type="button" value="Search" id="search_btn"/>
		<span id="data"></span>	 
        		
  </div>
  <div id="addbranch">
       <label>Branch Name</label> <input type="text" id="branch_name_txt" class="text" /> <br/><br/>
       <label>Branch Email</label> <input type="text" id="branch_email_txt" class="text" /><br/><br/>
       <label>Address</label> <input type="text" id="branch_address_txt" class="text" /><br/><br/>
       <label>City</label> <input type="text" id="branch_city_txt" class="text" /><br/><br/>
       <label>Branch Code</label> <input type="text" id="branch_code_txt" class="text" /><br/><br/>
       <label>Pin Code</label> <input type="text" id="pincode_txt" class="text" /><br/><br/>
       <label>Telephone</label> <input type="text" id="telephone_txt" class="text" /><br/><br/>
	   <input type="button" value="Add" id="add_branch_btn"/> <br/><br/>
  </div>
  
  <div id="bankmang">
       <label>Branch Name</label><input type="text" id="br_name" /><br/><br/>
       <label>Employee Id</label> <input type="text" id="emp_id" /><br/><br/>
       <label>Employee Name</label> <input type="text" id="emp_name" /><br/><br/>
	   <input type="button" value = "Allocate Manager" id="add_manag">
  </div> 
   <div id="emp_report">
   </div>
   <span id="span1"></span>
     <script type="text/javascript" src = "../LoginSystem/jQuery/jquery.js"></script>
     <script type="text/javascript" src = "jQuery/menu.js"></script>
</body>
</html>