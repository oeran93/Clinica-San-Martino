/*
* Add scroll to top functionality
*/
$("#scroll_top").click(function(){
	$('html,body').animate({
		scrollTop: 0
	},500);
});

/*
* Show/Hide scroll to top
*/
$(window).scroll(function(){
	y_position = $(window).scrollTop();
	if(y_position>=200){
		$('#scroll_top').fadeIn();
	}else{
		$('#scroll_top').fadeOut();
	}
});

/*
* Add scroll functionality to arrows
*/
$('.left_scroll_arrow').click(function(){
	$(".h_scroll").animate({scrollLeft:'-='+$('.h_scroll_box').width()}, 1000);;
});
$('.right_scroll_arrow').click(function(){
	$(".h_scroll").animate({scrollLeft:'+='+$('.h_scroll_box').width()}, 1000);
});

/*
* Format all services text to have ellipses if longer then 150 chars.
* modify to get the length from the html element!!
*/
$('.ellipsed_text').each(function(){
	$(this).html(dotdotdot($(this).html(),150));
})