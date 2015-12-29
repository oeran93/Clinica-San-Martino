/*
DEPENDENCIES: maps.js, map_styles.js (if any styles are used)
*/

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
