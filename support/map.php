<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Map Example</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript">
			var geocoder;
			var cityId;			
			jQuery(document).ready(function(){				
				initializeAutoComplete();
			});
			
			function initializeAutoComplete(){
				cityId = jQuery("#cityIdTop").val();
				var cityName = '';
				jQuery.ajax({
				      async: false,
				      dataType: "json",
				      url: 'CityDetails.action?id='+cityId,
				      success: function(json) {
			    		cityName = json.city.name;
				      }
				});					
				geocoder = new google.maps.Geocoder();			  
				setUpAutoComplete(jQuery("#origin"), cityName);
				setUpAutoComplete(jQuery("#destination"), cityName);
			}
			
			function setUpAutoComplete(element, city) {
			    if (city == "Bangalore")
			        city = "Bengaluru";
			    element.autocomplete({
			        source: function(request, response) {
			            var autoCompleteValue;
			            geocoder.geocode(
			            {
			                'address': request.term + "," + city + " ,India"
			            }, function(results, status) {
			                response(jQuery.map(results, function(item) {
			                    if (city == item.address_components[0].long_name) {
			                        autoCompleteValue = '';
			                    }
			                    else {
			                        autoCompleteValue = item.formatted_address;
			                    }
			                    return {
			                        label:  autoCompleteValue,
			                        value: autoCompleteValue,
			                        latitude: item.geometry.location.lat(),
			                        longitude: item.geometry.location.lng()
			                    };
			                }));
			            });
			        }
			    });
			}
			
 
			
			
		</script>	
</head>
<body>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry"></script>
 <input type="text" size="50" value="Madurai" name="cityIdTop" id="cityIdTop" />
 From : <input type="text" size="50" name="fromLocation" id="origin" />
 To : <input type="text" size="50" name="toLocation" id="destination" />
</body>
</html>
