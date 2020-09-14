$(document).ready(function(){
	$('#btn1').click(function(){
		$(this).attr('value','please wait');
		var email = $('#email').val();
		$.post('DataManipulate.php',{email:email},function(data){
			value = data;
			alert(value);
			if(value == 'Confirmation Code has been sent to your mail'){
				$('#center').hide();
				$('#confirm').show();
			}
		});
	});
	
	$('#btn2').click(function(){
		code = $('#confirm_text').val();
		$.post('DataManipulate.php',{code:code},function(data){
			value = data;
			alert(value);
			if(value == 'Matched'){
				$('#confirm').hide();
				$('#newpassword').show();
			}
		});
	});
	
	$('#btn3').click(function(){
		newpass = $('#new_pass').val();
		conpass = $('#con_pass').val();
		$.post('DataManipulate.php',{newpass:newpass,conpass:conpass},function(data){
			success = data;
			alert(success);
			if(success == 'password updated'){
				$('#newpassword').hide();
				$('#update').show();
			}
			
		});
	});
});