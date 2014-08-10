// *************************
// WPSVSE JS v. 20140809
// *************************
jQuery(document).ready(function($) {

	// ***************************
	// Tooltips
	// ***************************
	$('.wpsvse-tooltip').tooltip()
	
	// ***************************
	// Head slider
	// ***************************
	$('#header-slider').carousel({
  		interval: 10000
	})
});

	// ***************************
	// Twitter JS feed
	// ***************************
	jQuery(function($){
        var options = {
          modpath: './wp-content/themes/wpsvse/js/twitter/index.php',
          username: "WPSverige",
		  template: "<div class='tweet_content'>{text}</div> <div class='tweet_time'>{time}</div> <div class='tweet_action_links'>{reply_action} {retweet_action} {favorite_action}</div>",
          page: 1,
          avatar_size: 48,
          count: 5,
          fetch: 6, // 1 + count
          loading_text: "Laddar tweets ..."
        };

        var widget = $("#latest-tweets .widget"),
          next = $("#latest-tweets .next"),
          prev = $("#latest-tweets .prev");

        var enable = function(el, yes) {
          yes ? $(el).removeAttr('disabled') :
                $(el).attr('disabled', true);
        };

        var stepClick = function(incr) {
          return function() {
            options.page = options.page + incr;
            enable(this, false);
            widget.tweet(options);
          };
        };

        next.bind("checkstate", function() {
          enable(this, widget.find("li").length == options.count)
        }).click(stepClick(1));

        prev.bind("checkstate", function() {
          enable(this, options.page > 1)
        }).click(stepClick(-1));

        widget.tweet(options).bind("loaded", function() { next.add(prev).trigger("checkstate"); });
      });
