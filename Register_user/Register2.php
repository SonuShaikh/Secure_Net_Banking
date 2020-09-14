<?php
    @$file_name = $_FILES['file']['name'];
	@$file_type = $_FILES['file']['type'];
	@$file_size = $_FILES['file']['size'];
	@$file_tmp  = $_FILES['file']['tmp_name'];
	$extension  = strtolower(substr($file_name,strpos($file_name,'.')+1));
	if(isset($file_name)){
		if(!empty($file_name)){
			 if($extension =='png' || $extension =='jpeg' || $extension =='jpg' || $extension =='pdf'){
				if($file_size <= 10643212 ){
					
						$location = '../User_Data/';
						if(move_uploaded_file($file_tmp,$location.$file_name)){
							echo 'File Uploaded Successfuly';
						}else{
							echo 'Error Occure While Uploading File.';
						}
					
				}else{
					echo 'File Size More Than Enougth.'.$file_size;
				}
			}else{
				echo 'Only png or jpeg or jpg or pdf File are Allow.';
			}
		}else{
			echo 'Upload File Please';
		}
	}
?>


<!DOCTYPE html>
<html>
 <head>
    <meta charset="uft-8" />
	<title>Registeration form 2</title>
	<link rel="stylesheet" href="css/Reg1.css"/>
	<link rel="stylesheet" href="css/Reg2.css"/>
 </head>
 <body>
    <form>
	   <fieldset>
	      <legend>Registration Form 2</legend>
	       <fieldset id="fieldset4">
	          <legend>Type of Account</legend>
			  
			  <input type="radio" name="acctype" class="acctype" id="saving1" value="saving account (with checkbook)"/>
               <label for="saving1">Saving Account(with checkbook)</label> <br/>
			  
			  <input type="radio" name="acctype" class="acctype" id="saving2" value="saving account (withogth checkbook)"/> 
			  <label for="saving2">Saving Account(withoght checkbook)</label> <br/>
			  
			  
			  <input type="radio" name="acctype" class="acctype" id="nofill" value="No-Fill"/> 
			  <label for="nofill">No-frill Account</label><br/>
			  
			  <input type="radio" name="acctype" class="acctype" id="saving3" value="Premium Saving Account"/>
			  <label for="saving3">premium Saving Account</label><br/>
			  
			  <input type="radio" name="acctype" class="acctype" id="current" value="Current Account"/> 
			  <label for="current">Current Account</label><br/>
	      </fieldset>
		  <fieldset id="fieldset5">
		    <legend>Service Required</legend>
			<input type="checkbox" name="service" id="Atm"/>
			<label for="Atm">ATM Card</label><br/>
            <input type="checkbox" name="service" id="mobile_banking" value="Active"/>			
			<label for="mobile_banking">Mobile Banking</label> <br/>
			<input type="checkbox" name="service" id="sms" value="Active"/>			
			<label for="sms">Sms Alert</label><br/>
			<input type="checkbox" name="service" id="checkbook" value="Checked"/>
			<label for="checkbook">Checkbook</label><br/>
			<input type="radio" name="checkbook" id="Ordinary" value="Ordinary" class="check_type"/>
            <label for="Ordinary">Ordinary</label>	
            <input type="radio" name="checkbook" id="Multicity" value="Multicity" class="check_type"/>
            <label for="Multicity">Multicity</label>				
		  </fieldset>
		 </form> 
		  <fieldset id="fieldset6">
		   <legend>Document Varification</legend>
            <form action="Register2.php" Method="POST" enctype="multipart/form-data">		      
			  <label class="head">Proof Of Identifiaction:</label> <br/>
			  <label>Any Goverment photo Id Card</label>
			  <input type="file" name="file" class="upload" id="votarid" hovertext="Upload Your voterid" />
			  <input type="submit" class="upload_btn"  value="upload"/><br/>
		    </form>
		  </fieldset>
		 <form >
		  <fieldset id="fieldset8">
		     <legend>Licencse AgreeMent</legend>
			 <label>Read Agreement Care Fully.</label><br/>
			 
				 <textarea cols="50" rows="10" id="terms">
					Extreme, empirical, Predict , Judiciously, Remedy, merely, Interpretation, significance, inferred, interpret, Assessment, Substantial, Derived, Tied, Collapse, privilege, Maiden, retrace, Glance, drowning, efficiently, panic, encounter, plagiarism, consequence, refrain,  discard, unlike, illustration, corridor, derived, differ, intuition, consistent, optimistic, pessimistic, worst, invaders, conquer, credence, offence, instinctive, dispose,
					Intact -- Not damage, lack of 
					Tolerant   : Showing respect for the rights or opinions or practices of others 
					Distinct   : Different in nature or equality.
					Denial     : Act of refusing to comply.
					Comply     : Rules, commands, wishes.
					Auxiliary  : Someone who act as assistant.
					 

				 </textarea> <br/>
				 <input type="checkbox" name="agree" id="agree"/> 
				 <label for="agree" style="color:black" id="term_lbl"> I agree the term and condition of this site.</label>
		    
		 </fieldset>
		 <input type="button" id='save_btn' value="Save"/>
	   </fieldset>
	    
	</form>
	
	<script type="text/javascript" src="jQuery/jquery.js"></script>
	<script type="text/javascript" src="jQuery/register2.js"></script>
 </body>
</html>

 