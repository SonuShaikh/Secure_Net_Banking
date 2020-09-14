$(document).ready(function(){
	
	
	// Importan text here and all ofhter theisdr
	    $('#next').attr('disabled','disabled');
		var cust_type      = 'none';
		var cust_age       = 'none';
		var cust_gen       = 'none';
		var marrage_status = 'none';
		var edu            = 'none';
		var nation         = 'none';
		var state          = 'none';
		var city           = 'none';
		var title1         = 'none';
		var title2         = 'none';
	
	
	
	$('.h').mousemove(function(e){
		var hover = $(this).attr('hovertext');
		$("#hoverover").text(hover).show();
		$("#hoverover").css('top',e.clientY+15).css('left',e.clientX+15);
		
	}).mouseout(function(){
		$("#hoverover").hide();
	}).focusin(function(){
		$(this).addClass('focusin');
		
	}).focusout(function(){
		$(this).removeClass('focusin');
	    
	}).keyup(function(){
			
   });
   $('#dob').datepicker({dateFormat:'yyyy-mm-dd' });
   
	   
 // Grabing Checkbox's value 
   
 $('#public').change(function(){
	 value = $(this).attr('value');
	 cust_type = value;	 
	 $('#span1').text('');
 });
 $('#staff').change(function(){
	 value = $(this).attr('value');
	 cust_type = value;	 
	 $('#span1').text('');
 });
 $('#senior').change(function(){
	 value = $(this).attr('value');
	 cust_age = value;
	 $('#span1').text('');
     	 
 });
 $('#Minor').change(function(){
	 value = $(this).attr('value');
	 cust_age = value;	
	 $('#span1').text('');	 
 }); 
 $('#male').change(function(){
	 value = $(this).attr('value');
	 cust_gen = value;	
	 $('#span2').text('');	 
 });
 $('#female').change(function(){
	 value = $(this).attr('value');
	 cust_gen = value;	
	 $('#span2').text('');	 
 }); 
 $('#Married').change(function(){
	 value = $(this).attr('value');
	 marrage_status = value;	
	 $('#span2').text('');	 
 });
 $('#Unmarried').change(function(){
	 value = $(this).attr('value');
	 marrage_status = value;
	 $('#span2').text('');	 
 });
 $('#other').change(function(){
	 value = $(this).attr('value');
	 marrage_status = value;	
	 $('#span2').text('');	 
 });
 $('#N_graduate').change(function(){
	 value = $(this).attr('value');
	 edu = value;
	 $("#span4").text("");
 });
 $('#Graduate').change(function(){
	 value = $(this).attr('value');
	 edu = value;
	 $("#span4").text("");
 });
 $('#Post_graduate').change(function(){
	 value = $(this).attr('value');
	 edu = value;
	 $("#span4").text("");
 });
 $('#other_edu').change(function(){
	 value = $(this).attr('value');
	 edu = value;
	 $("#span4").text("");
 });
 // Select List Values
 $('#title1').change(function(){
	 title1 = $(this).val();
	 $('#name_feedback').text('');
 });
 $('#title2').change(function(){
	 title2 = $(this).val();
	 $('#f_feedback').text('');
 });
 $('#Nation').change(function(){
	 nation = $(this).val();	
     $('#span2').text('');	 
 });
 $('#state').change(function(){
	 state = $(this).val();
	 $('#span3').text('');
	  
 });
 function pincode(pincode){
	 $.post('Validate_Email.php',{pincode:pincode},function(data){
		$('#pincode').attr('value',data);
	 });
 }
 $('#city').change(function(){
	 city = $(this).val(); 
	 pincode(city);
	 $('#span3').text('');
 });
   $('#submit').click(function(){
	   
	   first   = jQuery.trim($("#first").val());
	   last    = jQuery.trim($("#last").val());
	   middle  = jQuery.trim($("#middle").val());
	   f_first = jQuery.trim($("#f_first").val());
	   f_last  = jQuery.trim($("#f_last").val());
	   f_midd  = jQuery.trim($("#f_middle").val());
	   dob     = jQuery.trim($("#dob").val());
	   coradd  = jQuery.trim($("#CorAdd").val());
	   landmark  = jQuery.trim($("#landmark").val());
	   pincode   = jQuery.trim($("#pincode").val());
	   mobileno  = jQuery.trim($("#mobileno").val());
	   telephone = jQuery.trim($("#telephone").val());
	   email     = jQuery.trim($("#email").val());
	   
	   
	   
	   
	   if(cust_type == 'none'){
		   $('#span1').text("Select Cust Type Please");
	   }else if(cust_age == 'none'){
		    $('#span1').text("Select Cust age Please");
	   }else if(title1 == 'none'){
		   $('#name_feedback').text('Select Title of your name.')
	   }else if(last =='')
		   $("#name_feedback").text("Enter Your Last Name");
	   else if(first ==''){
		   $("#name_feedback").text("Enter Your first Name");
	   }else if(middle ==''){
		   $("#name_feedback").text("Enter Your Middle Name");
	   }else if(title2 == 'none'){
		   $('#f_feedback').text('Select Title of father name.')
	   }else if(f_last == ''){
		   $("#f_feedback").text("Enter your fathers Last name");
	   }else if(f_first== ''){
		   $("#f_feedback").text("Enter your fathers First name");
	   }else if(f_midd == ''){
		   $("#f_feedback").text("Enter your fathers middle name");
	   }else if(dob == ''){
		   $("#span2").text("Enter Your Birth Of Date.");
	   }else if(cust_gen == 'none'){
		   $("#span2").text("Select Your Gender");
	   }else if(nation == 'none'){
		   $('#span2').text("Select Your Nationality");
	   }else if(marrage_status == 'none'){
		    $("#span2").text("Select Your Married Status");
	   }else if(coradd == ''){
		    $("#span3").text("Enter Your Corresponding Address.");
	   }else if(landmark == ''){
		    $("#span3").text("Enter Land Mark of your Correspondence");
	   }else if(state == 'none'){
		    $('#span3').text("Select Your State's Name.")
	   }else if(city == 'none'){
		    $('#span3').text('Select your current city');
	   }else if(pincode == ''){
		    $("#span3").text("Fill In The Pin code");
	   }else if(mobileno == ''){
		    $("#span3").text("Enter Your Mobile Number.");
	   }else if(telephone == ''){
		    $("#span3").text("Enter valid telephone Number");
	   }else if(email == ''){
		    $("#span3").text("Enter valid email address");
	   }else if(edu == 'none'){
		    $("#span4").text("Select Your Educational Qualifiaction.");
	   }else{
		   $("#f_feedback").text("");
		   $("#span3").text("");
		  
		  
		  $.post('RegisterData.php',{cust_type:cust_type,cust_age:cust_age,title1:title1,last:last,first:first,middle:middle,title2:title2,f_last:f_last,f_first:f_first,f_middle:f_midd,dob:dob,cust_gen:cust_gen,nation:nation,marrage_status:marrage_status,coradd:coradd,landmark:landmark,state:state,city:city,pincode:pincode,mobileno:mobileno,telephone:telephone,email:email,edu:edu },function(data){
		   alert(data);
		   //$('#submit').attr('value','Saved').attr('disabled','disabled');
	   }); 
	   }	   
 }); 
 
 
 //Email Validation
  function email_validate(email){
	  $.post('Validate_Email.php',{email:email},function(data){
		  $('#span3').text(data);
	  })
  }
   $('#email').keyup(function(){
	   value = $(this).val();
	   email_validate(value);
	   
	   
   }).focusin(function(){
	   if($(this).val() == ''){
		   $('#span3').text('Go ahead and type valid Email Address');
	   }else{
		   email_validate($(this).val());
	   }
   }).blur(function(){
	   $('#span3').text('');
   });
   // Mobile Number Validations
   function phoneno_validation(phone_num){
	   $.post('Validate_Email.php',{phone_num:phone_num},function(data){
		   $('#span3').text(data);
	   })
   }
   $('#mobileno').keyup(function(){
	   value = $(this).val();
	   if(value != ''){
		   phoneno_validation(value);
	   }
   }).focusin(function(){
	   phoneno_validation($(this).val());
   }).blur(function(){
	   $('#span3').text('');
   });
});