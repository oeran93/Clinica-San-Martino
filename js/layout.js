
$(document).ready(function() {
		/*
		 * Scroll to section navbar link
		 */
		$(".navbar a").click(function(){
				$('html,body').animate({
					scrollTop: $($(this).data('section')).offset().top
				},'slow');
		});

		/*
		 * Add scroll functionality to arrows
		 */
		$('.left_scroll_arrow').click(function(){
			$($(this).data("id")).animate({scrollLeft:'-='+$('.h_scroll_box').width()}, 1000);;
			});
		$('.right_scroll_arrow').click(function(){
			$($(this).data("id")).animate({scrollLeft:'+='+$('.h_scroll_box').width()}, 1000);
			});

		/*
		 * Format all services text to have ellipses if longer then x chars.
		 */
		$('.ellipsed_text').each(function(){
			$(this).html(dotdotdot($(this).html(),$(this).data('text_length')));
		});
});

