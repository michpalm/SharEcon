<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 59.4064, lng: 17.9361},
          zoom: 16
        });
        infoWindow = new google.maps.InfoWindow;

        // every 3 seconds
        setInterval(updateMarker,3000);

        //Function to update postition
        //Currently random generated inside Kista area
        function updateMarker() {
          var latN = 59 + (Math.random() * (0.4099 - 0.4000) + 0.4000);
          var lngN = 17 + (Math.random() * (0.9499 - 0.9300) + 0.9300)
          var pos = {
            lat: parseFloat(latN.toPrecision(6)),
            lng: parseFloat(lngN.toPrecision(6))
          };
            console.log(pos);
            infoWindow.setPosition(pos);
            infoWindow.setContent('Your box');
            infoWindow.open(map);
            //map.setCenter(pos);
        }

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM1JQUa5dC8IaIOWSCl927p_HZ8P_FM34&callback=initMap" async defer></script>
  </body>
</html>
