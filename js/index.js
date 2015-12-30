/*
DEPENDENCIES: maps.js, map_styles.js (if any styles are used)
*/

/*
* Show hide bar when scrolling
*/
var y_position=0;
$(window).scroll(function(){
	new_y_position = $('.navbar').offset().top;
	if(y_position < new_y_position){
		$('.navbar').fadeOut();
		y_position = new_y_position;
	}else{
		$('.navbar').fadeIn();
		y_position = new_y_position;
	}
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

/*
* Add scroll functionality to arrows
*/
$('#left_scroll_arrow').click(function(){
	$(".h_scroll").animate({scrollLeft:'-='+$('.services_box').width()+10}, 1000);;
});
$('#right_scroll_arrow').click(function(){
	$(".h_scroll").animate({scrollLeft:'+='+$('.services_box').width()+10}, 1000);
});