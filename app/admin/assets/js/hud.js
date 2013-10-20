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

/*	$('a.delete').click(function(){
		var id = $(this).attr("data-id");
		var data = 'id=' + id ;
	}); */

	// Show hide dropdown lists
	
	/*$('.hud_trigger').click(function() {
		var $toOpen = $(this).next('.hud_sub_menu');
	  	var $opened = $('.hud_sub_menu.open');
        if ( $toOpen.hasClass("open") ) {
        	$toOpen.toggleClass('open');
	        $toOpen.slideToggle();
        } else {
	        $opened.toggleClass('open');
	        $opened.slideToggle();
			$toOpen.toggleClass('open');
	        $toOpen.slideToggle();
	    }
    });


	// Close dropdowns when modals open
	$('.hud_sub_menu a').click(function() {
		$('.hud_sub_menu').slideUp();
	})*/

	// tool tips
	$('#hud_toolbar_wrapper').tooltip({
	   selector: "[data-toggle=hud-tooltip]",
	   placement: "bottom"
	 })

	// Show only one modal at a time
	$("a[data-toggle=modal]").click(function(ev) {
	    $('.hud-modal').modal('hide')
	})

});

window.onload = function() {
    CKEDITOR.replace( 'edit-page-content' );
    CKEDITOR.replace( 'add-page-content' );
    CKEDITOR.replace( 'add-slide-content' );
};