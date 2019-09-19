jQuery(document).ready(function($) {

	$('html').removeClass('no-js');

	var $window = $(window);
	var header = $('#header');
	var page = $('#page');
	var body = $('#body');

	// push the footer down to the bottom of the page
	function pushFooterDown() {
		var minHeight = $window.height()-header.height();
		if( minHeight <= $window.height() ) {
			var $el = page.length > 0 ? page : body;
			$el.css('min-height', minHeight + 'px');
		}
		else {
			$el.css('min-height', '');
		}
	}

	// fall SVG images back to PNG
	if (!Modernizr.inlinesvg) {
		$("img[src$='.svg']").each(function() {
		  var $el = $(this);
		  $el.attr('src', $el.attr('src').replace(/\.svg$/,'.png'));
		});
	}

	$window.load(pushFooterDown).resize(pushFooterDown);
});
