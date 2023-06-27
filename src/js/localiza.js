// Define the initMap function
function initMap() {
  // This function will be called once the Google Maps API has finished loading
  navigator.geolocation.getCurrentPosition(
    function (position) {
      console.log(position.coords.latitude + " // " + position.coords.longitude);
      displayLocation(position.coords.latitude, position.coords.longitude);
    },
    function errorCallback(error) {
      console.log(error)
    }
  );
}

function displayLocation(latitude, longitude) {
  var geocoder;
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(latitude, longitude);

  geocoder.geocode(
    { 'latLng': latlng },
    function (results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          var addressComponents = results[0].address_components;
          var city;

          for (var i = 0; i < addressComponents.length; i++) {
            var types = addressComponents[i].types;
            if (types.includes('locality')) {
              city = addressComponents[i].long_name;
              break;
            }
          }

          if (city) {
            console.log(city);
            document.getElementById("playingFrom").innerHTML = city;
          } else {
            console.log("City not found in address");
          }
        } else {
          console.log("Address not found");
        }
      } else {
        console.log("Geocoder failed due to: " + status);
      }
    }
  );
}


