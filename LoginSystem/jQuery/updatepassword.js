$(document).ready(function(){
	$('#current_pass').focus(function(){
		var current_pass = $(this).val().length;
		if(current_pass == 0){
			$('#span1').text('Enter Your Password');
		}
	}).blur(function(){
		$('#span1').text('');
	});
	
	$('current_pass').keyup(function(){
		alert('keyup');		
	});
});