/*
DEPENDENCIES: maps.js, map_styles.js (if any styles are used)
*/

/*
* Scroll to section navbar link
*/
$(".navbar a").click(function(){
	$('html,body').animate({
		scrollTop: $($(this).data('section')).offset().top
	},'slow');
});

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
* Create the map for contact section
*/
var options = {id:'map',
			lat: 45.849690,
			lng: 9.371508,
			zoom:15,
			style: light_blue};
var map = create_map(options);
create_marker(map,options);

/*
* Format all services text to have ellipses if longer then 200 chars.
*/
$('.ellipsed_text').each(function(){
	$(this).html(dotdotdot($(this).html(),150));
})
