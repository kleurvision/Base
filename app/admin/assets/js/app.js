// File Input Script
function file_input(){
	var file = $('.file_input').val();
	$('.f_file_input').val(file);
}

// HUD Shelf Script
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