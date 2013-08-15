// File Input Script
function file_input(){
	var file = $('.file_input').val();
	$('.f_file_input').val(file);
}

// HUD Shelf Script
/*
function hud_extend(){
	if($('.trigger').hasClass('open')){
		$('#hud_toolbar_wrapper').animate({
			'height': 42 + 'px'
		}, 300);
		$('body').animate({ 
			'margin-top':42 + 'px'
		}, 300);
		$('.trigger').removeClass('open');

	} else {
	
		$('#hud_toolbar_wrapper').animate({
			'height': 300 + 'px'
		}, 300);
		$('body').animate({
			'margin-top':300 + 'px'
		}, 300);
		$('.trigger').addClass('open');
	}
}
*/

$(function() {

	$('#hud_edit_trigger').click(function() {
	  $('#hud_edit_menu').slideToggle('fast', function() {
	    // Animation complete.
	  });
	});

	$('#hud_new_trigger').click(function() {
	  $('#hud_new_menu').slideToggle('fast', function() {
	    // Animation complete.
	  });
	});

	$('#hud_menu_button').click(function() {
	  $('#hud_menu').slideToggle('fast', function() {
	    // Animation complete.
	  });
	});
	

	// tool tips
	$('#hud_toolbar_wrapper').tooltip({
	   selector: "[data-toggle=tooltip]",
	   placement: "bottom"
	 })


});