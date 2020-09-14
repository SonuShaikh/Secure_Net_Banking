$(document).ready(function(){
	alert('First Upload File');
	 $(".check_type").attr("disabled","disabled").css("color",'black');
	 $('#agree').attr('disabled','disabled');
	 $('.upload_btn').attr('disabled','disabled');
	
	//Variable Declaratioin
	 var type_acc = 'None';
	 var count_a = 0;
	 var atm     = 'No';
	 var count_m = 0;
	 var Mobile_banking = 'No';
	 var count_s = 0;
	 var sms     = 'No';
	 var count_c = 0;
	 var checkbook = 'No';
	 var checkbook_type;
	 var aggre_count = 0;
	 var agree = 'No';
	 var click_count = 0;
	 
	 
	
	//Grabbig value form checkbox and radio button
	$('.acctype').change(function(){
		type_acc = $(this).attr('value');
	});
	$('#agree').change(function(){
		c = aggre_count++;
		
		if(c%2==0){
			agree = 'Yes';
		}else{
			agree = 'No';
		}
	});
	$('#Atm').change(function(){
		c = count_a++;
		if(c%2==0){
			atm = 'Yes';
		}else{
			atm = 'No';
		}
	});
	$('#mobile_banking').change(function(){
		c = count_m++;
		
		if(c%2==0){
			Mobile_banking = 'Yes';
		}else{
			Mobile_banking = 'No';
		}
	});
	$('#sms').change(function(){
		c = count_s++;
		
		if(c%2==0){
			sms = 'Yes';
		}else{
			sms = 'No';
		}
	}); 
	 $('#checkbook').change(function(){
		c = count_c++;
		
		if(c%2 == 0){
			$(".check_type").removeAttr("disabled");
			$('.check_type').change(function(){
				checkbook_type = $(this).attr('value');
				checkbook = 'Yes';				
			});
			
		}else{
			$(".check_type").attr("disabled","disabled");
			 checkbook = 'No';
		}
	}); 
	$('#votarid').change(function(){
		$('.upload_btn').removeAttr('disabled','disabled');
	});
	$('.upload_btn').click(function(){
		$(this).attr('value','File Uploaded');
	});
	
	  $('#save_btn').click(function(){
		if(type_acc == 'None'){
			alert('Select Your Account Type');
		}else if(agree == 'No'){
			alert('Accept Agreement.');
		}else{
			if(checkbook == 'No'){
				checkbook_type = "No";
			}
		  $.post('RegisterData.php',{type_acc:type_acc,atm:atm,Mobile_banking:Mobile_banking,sms:sms,checkbook_type:checkbook_type},function(data){alert(data);});
			$(this).attr('value','Saved').attr('disabled','disabled');
		} 
	});
	
	$('#terms').scroll(function(){
		var textarea_height = $(this)[0].scrollHeight;
		var scroll_height   = textarea_height - $(this).innerHeight();
		
		var scroll_top = $(this).scrollTop();
		if(scroll_top == scroll_height) {
			$('#agree').removeAttr('disabled');
			$('#term_lbl').css('color','blue');
		}
	});
});