function initialize() {

  var mapOptions = {center: new google.maps.LatLng(12.9667, 77.5667),zoom: 13,mapTypeId: google.maps.MapTypeId.ROADMAP};
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
    map: map
  });

  var infowindow2 = new google.maps.InfoWindow();
  var marker2 = new google.maps.Marker({
    map: map2
  });  
  
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();marker.setVisible(false);input.className = '';var place = autocomplete.getPlace();
	if (!place.geometry) {
      // Inform the user that the place was not found and return.
      input.className = 'notfound';
      return;
    }
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {map.fitBounds(place.geometry.viewport);} else {map.setCenter(place.geometry.location);map.setZoom(17);}
    marker.setIcon(/** @type {google.maps.Icon} */({
      url: 'http://ptgmedia.pearsoncmg.com/images/chap5_9780321929549/elementLinks/b_icon.jpg',
      size: new google.maps.Size(24, 24),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(24, 24)
    }));
    marker.setPosition(place.geometry.location);marker.setVisible(true);
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
    infowindow2.close();marker2.setVisible(false);input2.className = '';var place2 = autocomplete2.getPlace();
    if (!place2.geometry) {
      // Inform the user that the place was not found and return.
      input2.className = 'notfound';
      return;
    }
    // If the place has a geometry, then present it on a map.
    if (place2.geometry.viewport) {map2.fitBounds(place2.geometry.viewport);} else {map2.setCenter(place2.geometry.location);map2.setZoom(17);}
    marker2.setIcon(/** @type {google.maps.Icon} */({
      url: 'http://ptgmedia.pearsoncmg.com/images/chap5_9780321929549/elementLinks/b_icon.jpg',
      size: new google.maps.Size(24, 24),
      origin: new google.maps.Point(0, 0),
      anchor: new google.maps.Point(17, 34),
      scaledSize: new google.maps.Size(24, 24)
    }));
    marker2.setPosition(place2.geometry.location);marker2.setVisible(true);

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