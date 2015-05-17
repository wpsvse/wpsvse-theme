// *************************
// WPSVSE JS v. 20150515
// *************************
jQuery(document).ready(function($) {

	// ***************************
	// Tooltips
	// ***************************
	$('.wpsvse-tooltip').tooltip()
	
	// ***************************
	// Popover
	// ***************************
	$('[data-toggle="popover"]').popover()
	
	// ***************************
	// Head slider
	// ***************************
	$('#header-slider').carousel({
  		interval: 10000
	})
	
	// ***************************
	// Collapse trigger
	// ***************************
	 $(".bbp-topic-reply-link,.d4p-bbt-quote-link").click(function(){
        $(".bbp-reply-form .collapse").collapse('toggle');
    });
		
});

// ***************************
// Scroll to top
// *************************** 
jQuery(window).scroll(function(){
	var $scrollup = jQuery('.back-to-top');
	if (jQuery(this).scrollTop() > 100) { $scrollup.fadeIn(); }
	else { $scrollup.fadeOut(); }
});

jQuery('.back-to-top').click(function () {
	jQuery("html, body").animate({
		scrollTop: 0
	}, 600);
	return false;
});