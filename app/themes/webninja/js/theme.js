$(document).ready(function() {
	// Fade Ins
	$('#hero-title').show().addClass('animated fadeInLeft');

	/*
	$('.btn').hover(
		function () {
			$(this).addClass('animated flip');
		 },
		 function () {
		   $(this).removeClass("animated flip");
		 }
	);
	*/

	// Appear on visible
	$('#village-people').appear();
	$('#what-list').appear();
	$('#what-description').appear();
	$('#carousel-customers').appear();

	// Appear functions
	$('#what-list').on('appear', function(event, $all_appeared_elements) {
		$(this).addClass('animated fadeInRight');
	 });
	$('#village-people').on('appear', function(event, $all_appeared_elements) {
		$(this).addClass('animated fadeInUp');
	 });
	$('#what-description').on('appear', function(event, $all_appeared_elements) {
		$(this).addClass('animated fadeInLeft');
	 });
	$('#carousel-customers').on('appear', function(event, $all_appeared_elements) {
		$('#examples-title').addClass('animated fadeInDown');
	 });


	// Carousel
	$('.carousel').carousel()

});