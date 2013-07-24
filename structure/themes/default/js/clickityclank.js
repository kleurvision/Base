(function($) {
	$.fn.fullsize = function(container){
    	var imgItem = $(this);
    	var imgCont	= $(container);
        	
    	imgCont.find('img').each(function(){
			var imgClass = (this.width/this.height > 1) ? 'wide' : 'tall';
			imgItem.addClass(imgClass);
		})	
						
		function resizeHero(){

			var marginTop = (imgItem.height() > 600) ? -imgItem.height() / 3 : 0;
			var Top = (imgItem.height() > 600) ? 33+'%' : 0;
		
	    	imgItem.css({
				'position':'absolute',
				'top':Top,
				'margin-top':marginTop +'px',
				'min-height':600+'px',
				'width':100+'%',
			})
		
			imgCont.css({
				'position':'relative',
				'width':100+'%',
				'height':100+'%'
			})
		}
		resizeHero();
		$(window).resize(function() {
			resizeHero();
		});
	}
	
})(jQuery)

$(document).ready(function() {
	$('#myCarousel').css({
		'visibility':'visible'
	})
	
	$('#myCarousel').bxSlider({
		  minSlides: 3,
		  maxSlides: 4
		});
});


$(document).ready(function() {
	$(".heroImg img").fullsize('.heroImg');
});

$(document).ready(function() {
	$('.bxslider').bxSlider({
		  minSlides: 4,
		  maxSlides: 4,
		  slideWidth: $('.container').width()/4,
		  slideMargin: 0
		});
});

$(document).ready(function() {
	$(".portfolio_item").fancybox({
	});
});
	
		
jQuery(function($){
    $(".tweet").tweet({
        username: "clickityclank",
        join_text: "auto",
        count: 1,
        auto_join_text_default: "",
        auto_join_text_ed: "",
        auto_join_text_ing: "",
        auto_join_text_reply: "",
        auto_join_text_url: "",
        loading_text: "<span>loading tweets...</span>"
    });
	setTimeout(function() { jQuery('#message').animate({ height: 0, opacity: 0}, 'slow');}, 5000);
});


$('#submit-quote, #submit-jobinterest, #submit-contact').click( function() {
	var formSubmit = $(this).data('submit');
	$("form#"+formSubmit).submit();
})
