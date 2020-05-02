
'use strict';



/* google map
================================================== */
function _g_map ()
{
	var maps = jQuery('.g_map');

	if ( maps.length > 0 ) {

		maps.each(function() {
			var current_map = jQuery(this);
			var latlng = new google.maps.LatLng(current_map.attr('data-longitude'), current_map.attr('data-latitude'));
			var point = current_map.attr('data-marker');

			var myOptions = {
				zoom: 14,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				mapTypeControl: false,
				scrollwheel: false,
				draggable: true,
				panControl: false,
				zoomControl: false,
				disableDefaultUI: true
			};

			var stylez = [
				{
					featureType: "all",
					elementType: "all",
					stylers: [
						{ saturation: -100 } // <-- THIS
					]
				}
			];

			var map = new google.maps.Map(current_map[0], myOptions);

			var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });
			map.mapTypes.set('Grayscale', mapType);
			map.setMapTypeId('Grayscale');

			var marker = new google.maps.Marker({
				map: map,
				icon: {
					size: new google.maps.Size(66,56),
					origin: new google.maps.Point(0,0),
					anchor: new google.maps.Point(20,56),
					url: point
				},
				position: latlng
			});

			google.maps.event.addDomListener(window, "resize", function() {
				var center = map.getCenter();
				google.maps.event.trigger(map, "resize");
				map.setCenter(center);
			});
		});
	}
};


jQuery(document).ready(function() {

	_g_map();

});
