(function($) {
	var REFRESH_INTERVAL = 100,
		url = location.hash.replace(/^#/, ''),
		load_content = function(url) {
			// Menu active class
			$('#menu a[href=#' + url + ']').addClass('active')
				.siblings('.active').removeClass('active');
			
			// AJAX call for content
			$('#content').load(url);
		},
		refresh_url = function(new_url) {
			if( new_url != url ) {
				url = new_url;
				load_content(url);
			}
		},
		// Compare the current hash to the url in a short interval
		// to allow browsing with forward/backward links
		interval,
		reset_interval = function() {
			clearInterval(interval);
			interval = setInterval(function() {
				refresh_url(location.hash.replace(/^#/, ''));
			}, REFRESH_INTERVAL);
		};
	
	// Default selected link
	if( url == '' )
		url = location.hash = 'pages';
	
	// Assert instant response to hashtag links
	$('a[href^=#]').live('click', function() {
		reset_interval();
		refresh_url($(this).attr('href').substring(1));
	});
})(jQuery);