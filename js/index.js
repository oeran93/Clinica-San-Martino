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
* Create the map for contact section
*/
var options = {
			id:'map',
			lat: 45.849690,
			lng: 9.371508,
			zoom:15,
			style: light_blue,
			infowindow: new google.maps.InfoWindow({
				content: "Via Selvetta, angolo Via Paradiso,</br>23864 Malgrate LC, Italy"
			})};
var map = create_map(options);
create_marker(map,options);

$('#header_bg_image').sS({
						path: './images/bg/',
						images: [
							'1.jpg',
							'2.jpg',
							'3.jpg',
							'4.jpg',
							'5.jpg',
							'6.jpg'
						]
					});

