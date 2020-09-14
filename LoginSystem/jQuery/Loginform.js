$(document).ready(function(){
	var window_height = $(window).height();
	var window_width  = $(window).width();
	var obj_height    = $('#Login').height();
	var obj_width     = $('#Login').width();
	
	$('#Login').css('top',(window_height/2) - (obj_height/2)).css('left',(window_width/2)-(obj_width)/2);
	
	 $('#lbl_dev').mouseover(function(){
		$('#devloper').show();
	}).mouseout(function(){
		$('#devloper').hide();
	});
});
