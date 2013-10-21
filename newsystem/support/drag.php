<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Places Autocomplete</title>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
	<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
	<script type="text/javascript" src="jquery-1.7.2.min.js"></script>
    <style>
      input {
        border: 1px solid  rgba(0, 0, 0, 0.5);
      }
      input.notfound {
        border: 2px solid  rgba(255, 0, 0, 0.4);
      }
		#map-canvas, #map_canvas {
		  height: 100%;
		}

		@media print {
		  html, body {
			height: auto;
		  }

		  #map-canvas, #map_canvas {
			height: 650px;
		  }
		}

		#panel {
		  position: absolute;
		  top: 5px;
		  left: 50%;
		  margin-left: -180px;
		  z-index: 5;
		  background-color: #fff;
		  padding: 5px;
		  border: 1px solid #999;
		}	  
    </style>

    <script>
var newAddr = '';
var newAddr2 = '';
var geocoder = new google.maps.Geocoder();
function geocodePosition(mapObj,infowindowObj,markerObj,pos,dest) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
		if(dest=='#searchTextField'){newAddr=responses[0].formatted_address;}else{newAddr2=responses[0].formatted_address;}
		$(dest).val(responses[0].formatted_address);
		infowindowObj.setContent('<strong>' + responses[0].formatted_address + '</strong>');
		return responses[0].formatted_address;
    } else {
      alert('Cannot determine address at this location.');
    }
  });
}

function initialize() {

  var mapOptions = {
    center: new google.maps.LatLng(12.9667, 77.5667), 
    zoom: 13,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
  var map2 = new google.maps.Map(document.getElementById('map-canvas2'),mapOptions);

  var input = /** @type {HTMLInputElement} */(document.getElementById('searchTextField'));
  var autocomplete = new google.maps.places.Autocomplete(input);

  var input2 = /** @type {HTMLInputElement} */(document.getElementById('searchTextField2'));
  var autocomplete2 = new google.maps.places.Autocomplete(input2);  
  
  autocomplete.bindTo('bounds', map);
  autocomplete2.bindTo('bounds', map2);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map,
	draggable:true
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    var abc = geocodePosition(map,infowindow,marker,marker.getPosition(),'#searchTextField');
	//updateInfoBox(abc,infowindow, map,marker);
	//alert(newAddr);
	//infowindow.setContent('<strong>' + newAddr + '</strong>');
    //infowindow.open(map, marker);	
  });  
  
  var infowindow2 = new google.maps.InfoWindow();
  var marker2 = new google.maps.Marker({
    map: map2,
	draggable:true
  });
  
/**/
  google.maps.event.addListener(marker2, 'dragend', function() {
    var def = geocodePosition(map2,infowindow2,marker2,marker2.getPosition(),'#searchTextField2');
	//updateInfoBox(def,infowindow2, map2,marker2);
	//alert(newAddr2);
	//infowindow2.setContent('<strong>' + newAddr2 + '</strong>');
    //infowindow2.open(map2, marker2);
  });
/**/  

function updateInfoBox(newAddr, infowindowObj, mapObj, markerObj) {
	infowindowObj.setContent('<strong>' + newAddr + '</strong>');
    infowindowObj.open(mapObj, markerObj);
}  
  
  
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    input.className = '';
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      // Inform the user that the place was not found and return.
      input.className = 'notfound';
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);  // Why 17? Because it looks good.
    }
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: 'marker3.png',
      size: new google.maps.Size(24, 24),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(24, 24)
    }));
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
        (place.address_components[0] && place.address_components[0].short_name || ''),
        (place.address_components[1] && place.address_components[1].short_name || ''),
        (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });

  
  google.maps.event.addListener(autocomplete2, 'place_changed', function() {
    infowindow2.close();
    marker2.setVisible(false);
    input2.className = '';
    var place2 = autocomplete2.getPlace();
    if (!place2.geometry) {
      // Inform the user that the place was not found and return.
      input2.className = 'notfound';
      return;
    }

    // If the place has a geometry, then present it on a map.
    if (place2.geometry.viewport) {
      map2.fitBounds(place2.geometry.viewport);
    } else {
      map2.setCenter(place2.geometry.location);
      map2.setZoom(17);  // Why 17? Because it looks good.
    }
    marker2.setIcon(/** @type {google.maps.Icon} */({
      url: 'marker2.png',
      size: new google.maps.Size(24, 24),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(24, 24)
    }));
    marker2.setPosition(place2.geometry.location);
    marker2.setVisible(true);

    var address2 = '';
    if (place2.address_components) {
      address2 = [
        (place2.address_components[0] && place2.address_components[0].short_name || ''),
        (place2.address_components[1] && place2.address_components[1].short_name || ''),
        (place2.address_components[2] && place2.address_components[2].short_name || '')
      ].join(' ');
    }
    infowindow2.setContent('<div><strong>' + place2.name + '</strong><br>' + address2);
    infowindow2.open(map2, marker2);
  });  
  
  // Sets a listener on a radio button to change the filter type on Places
  // Autocomplete.
  function setupClickListener(id, types) {
    var radioButton = document.getElementById(id);
    google.maps.event.addDomListener(radioButton, 'click', function() {
      autocomplete.setTypes(types);
    });
  }
  //setupClickListener('changetype-all', []);
  //setupClickListener('changetype-establishment', ['establishment']);
  //setupClickListener('changetype-geocode', ['geocode']);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
  <div style="float:left;width:400px;">
    <div id="panel" style="margin-left: -260px;">
      <input id="searchTextField" type="text" size="50">
    </div>
    <div id="map-canvas" style="width: 350px;height:300px;"></div>
  </div>
  
  <div style="float:right;width:400px;">
    <div id="panel2" style="margin-left: 60px;">
      <input id="searchTextField2" type="text" size="50">
    </div>
    <div id="map-canvas2" style="width: 350px;height:300px;"></div>
  </div>  
  </body>
</html>