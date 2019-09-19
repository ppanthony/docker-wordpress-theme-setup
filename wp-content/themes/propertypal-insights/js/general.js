jQuery(document).ready(function($) {

	function sidebar() {

		if(!Modernizr.flexbox) {

			$('#sidebar, .sbar-container').height('');

			if($(window).width() >= 768) {

				var height = 0;
				$('#sidebar, #article').each(function() {
					height = Math.max(height, $(this).height());
				});
				if(height > 0) {
					$('#sidebar').height(height + 10);
					$('.sbar-container').height(height + 26);
				}

			}

		}
	}
	$(window).load(sidebar).resize(sidebar);

	$('button, input[type="button"], input[type="submit"]').addClass('btn btn-red');

	if($('.post-6796').length == 0)
		$('.entry img, .post img').removeClass('unresponsive').removeClass('unclear');
	$('.entry img:not(.unresponsive,.unclearr), .post img:not(.unresponsive,.unclear)').addClass('img-responsive');
	$('.post .text img').addClass('hidden-print').remove();

	$('.entry iframe').wrap(function() {
		return '<div class="embed-responsive embed-responsive-16by9">' + $(this).addClass('embed-responsive-item').removeAttr('height').removeAttr('width').html() + '</div>';
	});

	if($('.postInfo').children().length == 0)
		$('.postInfo').remove();

	if($('.jetpack_subscription_widget .widgettitle label').length > 0) {
		var text = $('.jetpack_subscription_widget .widgettitle label').text();
		$('.jetpack_subscription_widget .widgettitle label').remove();
		$('.jetpack_subscription_widget .widgettitle').html(text);
	}

	$('.mediaicons').selectorQuery();

	$('.post-image img').click(function(){
		$(this).parents('post:first').find('a').trigger('click');
	});

	function fixPostImageWidth() {
		$('.entry img').width('');
		var articleWidth = $('#article').width();
		$('#article .entry img').each(function() {
			var imgWidth = $(this).width();
			if(imgWidth >= articleWidth)
				$(this).css('max-width', articleWidth + 'px');
		});
	}
	$(window).load(function() {
		fixPostImageWidth();
		sidebar();
	});
	$(window).resize(fixPostImageWidth);

	if($('body').hasClass('lt-ie9')) {
		$('.post-image img').css('visibility', 'hidden');

		$(window).resize(function(){
			if($(window).width() < 768)
				$('.post-image').height('');
		});

		$(window).load(function(){
			$('.post-image').each(function() {
				$(this).height($(this).parent().height());
				$(this).imgLiquid({
					fill: false,
					horizontalAlign: 'left',
					verticalAlign: 'top'
				});
			});
		});

	}

});
