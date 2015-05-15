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
	
});