<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
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
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 59.4064, lng: 17.9361},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // every 10 seconds
        setInterval(updateMarker,1000);

        function updateMarker() {
          var pos = {
            lat: 59. + Math.random(),
            lng: 17. + Math.random()
          };
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
