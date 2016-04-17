

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
})