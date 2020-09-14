<!DOCTYPE html>
<html>
  <head>
      <meta charset='utf-8'/>
      <title> Registration page 1 </title>
	  <link rel="stylesheet" href="css/Reg1.css"/>
	 
  </head>
<body> 
      
      <form>
	   <div id="hoverover"></div>
	   
	   <fieldset id="fieldset1">
	       <legend><h3> Personal Details</h3></legend>
	     <fieldset id="fieldset2">
		  <legend>Nomination Details</legend>
		 <label class="head">Customer Type</label>  <br/>
		 <input type="radio" name="custType" id="public" value='Public' />
		 <label for="public" hovertext='Select Customer Type. ie(public/Minor)' class='h'>public</label>
		  <input type="radio" name="custType" id="staff" value="Staff"/>
		  <label for="staff" hovertext='Select Customer Type. ie(public/Minor)' class='h'>Staff</label>
		  <input type="radio" name="custage" id="senior" value="Senior"/>
		  <label for="senior" hovertext='Select Customer Type. ie(public/Minor)' class='h'>Senior Citizen</label>
		  <input type="radio" name="custage" id="Minor" value="Minor"/>
		  <label for="Minor" hovertext='Select Customer Type. ie(public/Minor)' class='h'>Minor</label> 
		  <span id='span1'></span>
		   
		   <br/>
	       <label class='head'>Name Of Candidate:</label> <br/>
		   <label class='label'>Title</label>
		   <label class='label'>Last_Name</label>
		   <label class='label'>First_Name</label>
		   <label class='label'>Middle_Name</label>
		  
		   <br/>
		   <p>
		      <select id="title1">
		     <option>Title</option>
		     <option name="Mr" value="Mr">Mr.</option>
		     <option name="Ms" value="Ms">Ms.</option>
		     <option name="Mrs" value="Mrs">Mrs.</option>
		   </select> 
		    
		   <input type='text' name='last' id='last' hovertext="Enter Your First Name" class="h"/>
		   <input type='text' name='first' id='first' hovertext="Enter Your Last Name" class="h"/>
		   <input type='text' name='middle' id='middle' hovertext="Enter Your Middle Name" class="h"/>
		    <span id="name_feedback" style="color:blue;font-size:20px;"></span>
		   </p>
		   
		   <label class='head'>Name of the father/Gradiant: </label><br/>
		   
		   <label class='label'>Title</label>
		   <label class='label'>Last_Name</label>
		   <label class='label'>First_Name</label>
		   <label class='label'>Middle_Name</label>
		   <p>
		      <select id="title2">
		     <option>Title</option>
		     <option name="Mr" value="Mr">Mr.</option>
		     <option name="Ms" value="Ms">Ms.</option>
		     <option name="Mrs" value="Mrs">Mrs.</option>
		   </select> 
		   
		   <input type='text' name='f_last' id='f_last' hovertext="Enter Your Fathers Last Name" class="h" />
		   <input type='text' name='f_first' id='f_first' hovertext="Enter Your Fathers First Name" class="h" />
		   <input type='text' name='f_middle' id='f_middle' hovertext="Enter Your Fathers Middle Name" class="h"/>
		   <span id="f_feedback" style="color:lime;font-size:20px;"></span>
		   </p>		  
		   <label class="head"> Date Of Birth </label>
		   <input type="text" name="dob" id="dob" hovertext="Enter your date of birth(22/feb/1995)" class="h" size="8"/> 
		   <label class="head">Gender</label> 
		   <input type="radio" name="gen" value="male" id="male" />
		   <label for="male" hovertext="Are you a male..??" class="h">Male</label>
		   <input type="radio" name="gen" value="female" id="female" />
		   <label for="female" hovertext="Are you a female..??" class="h">Female</label>
		   <label class="head" >Nationality:</label>
		   <select id='Nation'>
		      <option>Select Nation</option>
		      <option value="America">America</option>
		      <option value="Austrolia">Austrolia</option>
		      <option value="Canada">Canada</option>
		      <option value="China">China</option>
		      <option value="India">Indian</option>
		      <option value="Iran">Iran</option>
		      <option value="Iraq">Iraq</option>
		      
		   </select> <br/>
		   <label class="head">Martatle Status<label> <br/>
		   
		   <input type="radio" name="marrage" value="Married" id="Married"/>
		   <label for="Married" hovertext="Are You Married" class="h">Married</label>
		   <input type="radio" name="marrage" value="Unmarrid" id="Unmarried"/>
		   <label for="Unmarried" hovertext="Are You UnMarried" class="h">Unmarried</label>
		   <input type="radio" name="marrage" value="Other" id="other"/>
		   <label for="other" hovertext="Other Marritatle Status" class="h">Other</label> 
		   <span id='span2'></span>
		   <p>
		   </fieldset>
		   <fieldset id="fieldset7">
		      <legend>Address Details</legend>
		     <label class="head">Correspond Address</label><br/>
			 <textarea rows="5" cols="80" id='CorAdd' hovertext="Enter Your Fill Address" class="h"></textarea><br/>
			 
			 <label>Land Mark/ Street</label>
			 <input type="text" name="land mark" id="landmark" size="55" hovertext="Enter Your Landmark" class="h"/>
			 
			 <br/>
			 <label hovertext="Choose Your State." class="h">State:</label> 
			 <select id="state">
			    <option>Select State</option>
				<option value="Maharashtra">Maharashtra</option>
				<option value="Gujrat">Gujrat</option>
				<option value="Rajastan">Rajastan</option>
				<option value="Tamilnad">Tamilnad</option>
				<option value="Kerala">Kerala</option>
				<option value="Madhya Pradesh">Madhya Pradesh</option>
			    
			 </select>
			 
			 <label hovertext="Choose Your City. " class="h">City:</label>
               <select id="city" "class="title">
				  <option>Select City</option>
				  <option value="Aurangabad">Auangabad</option>
				  <option value="Latur">Latur</option>
				  <option value="Pune">Pune</option>
				  <option value="Mumbai">Mumbai</option>
				  <option value="Osmanabad">Osmanabad</option>
				  <option value="Beed">Beed</option>		
			   </select>			 
			   <label>Pin Code:</label>
			   <input type="text" name="pincode" id="pincode" size="10" hovertext="Enter Correct Pin." class="h"/> <br/>
			   <label>Mobile No:</label>
			   <input type="text" name="Mobile" id="mobileno" hovertext="Phone Number will be used for sms alert." size="10" class="h"/>
			   <label>Telephone No:</label>
			   <input type="text" name="telephone" id='telephone' hovertext="Enter Your Telephone Num." size="10" class="h"/> <br/>
			   <label >Email:</label>
			   <input type="text" name="email" id="email" size="30" hovertext="Emai Address will use as login id and other purpose" class="h"/>
		       <br/><span id='span3'></span>
			   </div>
		   </p>
		     </fieldset>
			 <fieldset id="fieldset3">
			   <legend>Addition Details</legend>
			   <!-- <label class="head">Religion:</label><br/>
			   <input type="radio" name="religion" value="Hindu" id="Hindu" class="h" />
			   <label for="Hindu">Hindu</label>
			   <input type="radio" name="religion" value="Muslim" id="Muslim" class="h" />
			   <label for="Muslim">Muslim</label>
			   <input type="radio" name="religion" value="Christen" id="Christen" class="h"  />
			   <label for="Christen">Christen</label>
			   <input type="radio" name="religion" value="Other" id="Other_religion" class="h" />
			   <label for="Other_religion">Other</label>
			    <span id='religinon_feedback'>Religion</span> -->
			   
			   <br/>
			   <label class="head">Educational Qualification </label> <br/>
			   <input type="radio" name="edu" value="Non Graduate" id="N_graduate" />
			   <label for="N_graduate" class='h' hovertext="Select your appropriat Qualification.">Non Graduate</label>
			   <input type="radio" name="edu" value="Graduate" id="Graduate"/>
			   <label for="Graduate" class='h' hovertext="Select your appropriat Qualification.">Graduate</label>
			   <input type="radio" name="edu" value="Post Graduate" id="Post_graduate"/>
			   <label for="Post_graduate" class='h' hovertext="Select your appropriat Qualification.">Post Graduate</label>
			   <input type="radio" name="edu" value="other_edu" id="other_edu"/>
			   <label for="other_edu" class='h' hovertext="Select your appropriat Qualification.">Other</label> <br/>
			   <br/> <span id='span4'></span>
			 </fieldset>
		   <p id="btn_section">
				<input type="button" name="submit" value="Save" id="submit" />
			    <input type="reset" name="reset" value="Clear" id="reset" />
				<label id="labelpage"> <a href="Register2.php" id="next">Next</a> </label>
		   </p>
		</fieldset>
	  </form>
	<script type='text/javascript' src='jQuery/jquery.js'></script>
	<script type='text/javascript' src='jQuery/jquery-ui.js'></script>
    <script type='text/javascript' src='jQuery/register.js'></script>
    <script type='text/javascript' src='jQuery/register1.js'></script>
</body>
</html>