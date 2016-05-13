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
	// Magnific Popup trigger
	// ***************************
	$('.lightbox').magnificPopup({
			type:'image'
	});

	// ***************************
	// Iframe Auto Height
	// ***************************
	 $('iframe.gp-frame').iframeAutoHeight();

	// ***************************
	// Backward compatibility
	// and media inserts for
	// Magnific Popup
	// ***************************
	$('.single-content a[href*=".jpg"], .single-content a[href*=".jpeg"], .single-content a[href*=".png"], .single-content a[href*=".gif"]').each(function(){
			//single image popup
			if ($(this).parents('.gallery').length == 0) {
							$(this).magnificPopup({type:'image'});
			}
	});
	//gallery popup
	$('.gallery').each(function() {
			$(this).magnificPopup({
							delegate: 'a',
							type: 'image',
							gallery: {enabled:true}
			});
	});

	// ***************************
	// Collapse trigger
	// ***************************
	$(".bbp-topic-reply-link,.d4p-bbt-quote-link").click(function(){
			$(".bbp-reply-form .collapse").collapse('toggle');
	});

	// Show collapsed elemento on load
	// for new topic page and .no-js class
	$(function() {
			$(".page-new-topic .bbp-topic-form .collapse,.no-js .bbp-topic-form .collapse,.no-js .bbp-reply-form .collapse,.reply-edit .bbp-reply-form .collapse,.topic-edit .bbp-topic-form .collapse,.topic-edit .bbp-reply-form .collapse").collapse('show');
	});

	// Trigger show on hash url for accordion
	location.hash && $(location.hash + '.collapse').collapse('show');

	// Open extarnal links in new tab and add class
	$('a').each(function() {
      var a = new RegExp('/' + window.location.host + '/');
      if (!a.test(this.href)) {
      	$(this).attr("target","_blank");
				$(this).attr("rel","external");
				$(this).addClass('ext-link');
      }
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
