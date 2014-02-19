
var map;
var brooklyn = new google.maps.LatLng(3.204341,101.680718);
var myLatlng = new google.maps.LatLng(3.204341,101.680718);

var MY_MAPTYPE_ID = 'custom_style';

function initialize() {

	var featureOpts = [
	{
		featureType: 'water',
		elementType: 'all',
		stylers: [
		{ hue: '#cdcdcd' },
		{ saturation: -100 },
		{ lightness: 18 },
		{ visibility: 'on' }
		]
	},{
		featureType: 'landscape',
		elementType: 'all',
		stylers: [
		{ hue: '#e8e8e8' },
		{ saturation: -100 },
		{ lightness: 18 },
		{ visibility: 'on' }
		]
	},{
		featureType: 'road',
		elementType: 'all',
		stylers: [
		{ hue: '#fdfdfd' },
		{ saturation: -100 },
		{ lightness: -1 },
		{ visibility: 'on' }
		]
	},{
		featureType: 'road.local',
		elementType: 'all',
		stylers: [
		{ hue: '#fdfdfd' },
		{ saturation: -100 },
		{ lightness: -1 },
		{ visibility: 'on' }
		]
	},{
		featureType: 'poi.park',
		elementType: 'all',
		stylers: [
		{ hue: '#c0c0c0' },
		{ saturation: -100 },
		{ lightness: -3 },
		{ visibility: 'on' }
		]
	},{
		featureType: 'poi',
		elementType: 'all',
		stylers: [
		{ hue: '#c0c0c0' },
		{ saturation: -100 },
		{ lightness: -3 },
		{ visibility: 'on' }
		]
	},{
		featureType: 'transit',
		elementType: 'all',
		stylers: [
		{ hue: '#ffffff' },
		{ saturation: -100 },
		{ lightness: -9 },
		{ visibility: 'on' }
		]
	}

	];

	var mapOptions = {
		zoom: 16,
		center: brooklyn,
		scrollwheel: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		},
		mapTypeId: MY_MAPTYPE_ID
	};

	map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);

	var styledMapOptions = {
		name: 'Custom Style'
	};

	var image = 'img/nudge_pin_2.png';
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		icon: image
	});

	var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

	map.mapTypes.set(MY_MAPTYPE_ID, customMapType);
}

google.maps.event.addDomListener(window, 'load', initialize);

google.maps.event.addDomListener(window, "resize", function() {
 var center = map.getCenter();
 google.maps.event.trigger(map, "resize");
 map.setCenter(center); 
});