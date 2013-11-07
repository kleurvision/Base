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

	// Sites - Toggle More Info
	$('.more-info').click(function() {
	  $('#site_' + $(this).attr('rel')).toggle('fade');
	  return false;
	});
});


// Typeahead for Exiting Site User Lookup by Email
$(document).ready(function(){

	$('input#existing_user_email').typeahead({

    name: 'user',
    valueKey: 'email',
    prefetch: 'http://webninja.me/admin/api/app.users'

	});
	
	// Bootstrap Carousel
	$('.carousel').carousel()


	$('#loginTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});


	$('#bio-begin,#bio-edit').click(function (e) {
		e.preventDefault()
		$('#plan').css('position', 'absolute'),
		$('#plan').animate({
			right: "-870px"
		}, 1000)
		$('#bio-questions').delay(500).fadeIn('slow')

	});

	$('#about-begin,#about-edit').click(function (e) {
		e.preventDefault()
		$('#plan').css('position', 'absolute'),
		$('#plan').animate({
			right: "-870px"
		}, 1000)
		$('#about-questions').delay(500).fadeIn('slow')
	});

	$('#brand-begin,#brand-edit').click(function (e) {
		e.preventDefault()
		$('#plan').css('position', 'absolute'),
		$('#plan').animate({
			right: "-870px"
		}, 1000)
		$('#brand-questions').delay(500).fadeIn('slow')
	});



	$('.save').click(function (e) {
	e.preventDefault()
	$('.question-batch').fadeOut('slow')
	$('#plan').animate({
		right: "0px"
	}, {
		duration: 1000, 
	}, {
		complete: function() {
			$('#plan').after.css('position', 'relative')
		}
	}
	)

});


});