$(document).ready(function(){
	 
	  $('#li1').click(function(){
		 
		 $('#welcome').hide();
		 $('#mang_emp').hide();
		 $('#addbranch').hide();
		 $('#bankmang').hide();
		 $('#Addemp').show(1000); 
	 });
	 
	 $('#li2').click(function(){
         
		 $('#welcome').hide();		 
		 $('#addbranch').hide();
		 $('#bankmang').hide();
		 $('#Addemp').hide();
		 $('#mang_emp').show(1000);
	 });
	 
	 $('#li3').click(function(){
		 $('#welcome').hide();
		 $('#Addemp').hide();
		 $('#mang_emp').hide();
		 $('#bankmang').hide();
		 $('#addbranch').show(1000);
	 });
	 
	 $('#li4').click(function(){
		 $('#welcome').hide();
		 $('#mang_emp').hide();
		 $('#addbranch').hide();
		 $('#Addemp').hide();
		 $('#bankmang').show(1000);
	 });
	 
	$('#Add_emp_btn').click(function(){
		emp_name  = $('#name').val();
		emp_email = $('#email').val();
		emp_phone = $('#phone').val();
		emp_add   = $('#address').val();
		emp_gen   = $('#gender').val();
		emp_Dob   = $('#Dob').val();
		emp_edu   = $('#edu').val();
		emp_desig = $('#desig').val();
		emp_branch = $('#branch_name').val();
		Joinin_date= $('#joiningdate').val();
		
		$.post('menudata.php',{name:emp_name,email:emp_email,phone:emp_phone,add:emp_add,gender:emp_gen,Dob:emp_Dob,edu:emp_edu,desig:emp_desig,branch:emp_branch,joiningdate:Joinin_date},function(data){
		   //$('#span1').text(data);
		   alert(data);
		   
	   });
	   
	});
	
	$('#search_btn').click(function(){
		id = $('#search_txt').val();
		$.post('menudata.php',{id:id},function(data){
			$('#data').html(data);
		});
	});
	
	$('#add_branch_btn').click(function(){
		bname  = $('#branch_name_txt').val();
		bemail = $('#branch_email_txt').val();
		badd   = $('#branch_address_txt').val();
		bcity  = $('#branch_city_txt').val();
		bcode  = $('#branch_code_txt').val();
		pincode= $('#pincode_txt').val();
		tphone = $('#telephone_txt').val();
		
		$.post('menudata.php',{bname:bname,bemail:bemail,badd:badd,bcity:bcity,bcode:bcode,pincode:pincode,tphone:tphone},function(data){
			 value = data;
			//$('#span1').text(data);
			alert(data);
			if(value == 'Successfuly New Employee Added.'){
				$('#add_branch_btn').attr('value','ADDED').attr('disabled','disabled');
			}
		});
	});
	
	$('#add_manag').click(function(){
		name       = $('#br_name').val();
		emp_id     = $('#emp_id').val();
		emp_name   = $('#emp_name').val();
	    $.post('menudata.php',{name:name,emp_id:emp_id,emp_name:emp_name},function(data){
			//$('#span1').text(data);
			alert(data);
		});
	});
});  