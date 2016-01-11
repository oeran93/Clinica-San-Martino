/*
* Creates a map given some options, places it on the page, and returns it.
* Options must be a javascript object and must contain:
*   id, lat, lng, zoom
* Optional features can be:
    mapTypeControl, scaleControl, draggable, scrollwheel, style
*/
function create_map(options) {
  map = new google.maps.Map(document.getElementById(options.id), {
    center: {lat: options.lat, lng: options.lng}, 
    zoom: options.zoom,
    mapTypeControl: options.mapTypeControl || false,
    scaleControl: options.scaleControl || false,
    draggable: options.draggable || false,
    scrollwheel: options.scrollwheel || false
  });
  if(typeof options.style!='undefined'){
    map.setOptions({styles:options.style});
  }
  return map;
}

/*
* creates a marker and puts it on a map
* Options must contain:
    lat, lng
*/
function create_marker(map, options){
    var marker = new google.maps.Marker({
        position:{lat:options.lat, lng:options.lng},
        map: map
    });
}
