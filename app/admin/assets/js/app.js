// File Input Script
function file_input(){
	var file = $('.file_input').val();
	$('.f_file_input').val(file);
}

$(function() {
	
	// fullheight sidebar
	$(window).resize(function() {
		maxHeight = $(window).height() - $('#branding').height();
		 $('#sidebar').height(maxHeight);	
	});
	$(window).resize();

	// tool tips
	$('body').tooltip({
	   selector: "[data-toggle=tooltip]",
	   placement: "bottom"
	 })

});