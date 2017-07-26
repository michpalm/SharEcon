<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/master.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="..\js\contract-calling.js"></script>

  <title>Choose location</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center"><h1>Set up your contract</h1></div>
      <form class="form-horizontal">
        <div class="form-group">
          <label for="inputItem" class="col-sm-4 control-label">What is being shared?</label>
          <div class="col-sm-5">
            <input name="item" class="form-control" id="inputItem" placeholder="Item, Service, etc...">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Origin</label>
          <div class="col-sm-5">
            <select id="inputOrigin" class="form-control">
              <option value="59.405046, 17.952489">Grönlandsgången</option>
              <option value="59.407439, 17.957688">Kistagången</option>
              <option value="59.409636, 17.961515">Helenelund station</option>
              <option value="59.402587, 17.948414">Jan Stenbecks torg</option>
              <option value="59.403178, 17.942405">Kista Centrum</option>
            </select>
          </div>
          <label class="col-sm-4 control-label">Destination</label>
          <div class="col-sm-5 margin-top">
            <select id="inputDestination" class="form-control">
              <option value="59.405046, 17.952489">Grönlandsgången</option>
              <option value="59.407439, 17.957688">Kistagången</option>
              <option value="59.409636, 17.961515">Helenelund station</option>
              <option value="59.402587, 17.948414">Jan Stenbecks torg</option>
              <option value="59.403178, 17.942405">Kista Centrum</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputTokens" class="col-sm-4 control-label">Cost</label>
          <div class="col-sm-5">
            <p class="form-control-static"><b>100 tkns</b></p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12 text-center">
            <div id="floating-panel">
              <b>Distance: 0</b>
            </div>
            <div id="map">
            </div>
            <script type="text/javascript">
            //Google Maps api functions
            function initMap() {
              var directionsService = new google.maps.DirectionsService;
              var directionsDisplay = new google.maps.DirectionsRenderer;
              var uluru = {lat: 59.403143, lng: 17.946796};

              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: uluru
              });
              directionsDisplay.setMap(map);

              var onChangeHandler = function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
              };
              document.getElementById('inputOrigin').addEventListener('change', onChangeHandler);
              document.getElementById('inputDestination').addEventListener('change', onChangeHandler);
            }

            function calculateAndDisplayRoute(directionsService, directionsDisplay) {
              directionsService.route({
                origin: document.getElementById('inputOrigin').value,
                destination: document.getElementById('inputDestination').value,
                travelMode: 'TRANSIT'
              }, function(response, status) {
                if (status === 'OK') {
                  directionsDisplay.setDirections(response);
                  var legs = response.routes[0].legs
                  var unit = legs[0].distance.text;
                  $("#floating-panel").html("<b> Distance: "+ unit +"</b>");
                  console.log(unit);
                  //console.log(origin);
                } else {
                  window.alert('Directions request failed due to ' + status);
                }
              });
            }
            </script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM1JQUa5dC8IaIOWSCl927p_HZ8P_FM34&callback=initMap" async defer></script>
          </div>
          <div class="col-md-12 text-center"><input value="Sign Contract" type="button" id="sc" class="btn btn-default margin-top"></input></div>
          <script type="text/javascript">
            var username = '<?php echo $_SESSION["username"]; ?>'
            var password = '<?php echo $_SESSION["pass"]; ?>'
            var methodToCall = 'objTransfer';
            document.getElementById("sc").onclick = function(){
              call_contract(username, password, methodToCall) ;
            };
          </script>
        </div>
      </form>
    </div>
  </div> <!-- /container -->
</body>
</html>
