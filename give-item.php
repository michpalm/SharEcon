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
  <link rel="stylesheet" href="css/master.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <title>Choose location</title>
</head>
<body>
  <script type="text/javascript">
    var username = '<?php echo $_SESSION["username"]; ?>'
    document.getElementById("sc").onclick = function() {call_contract(username)};
  </script>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center"><h1>Set up your contract</h1></div>
      <form class="form-horizontal">
        <div class="form-group">
          <label for="inputItem" class="col-sm-4 control-label">What is being shared?</label>
          <div class="col-sm-5">
            <input name="item" type="item" class="form-control" id="inputItem" placeholder="Item, Service, etc...">
          </div>
        </div>
        <div class="form-group">
          <label for="inputTokens" class="col-sm-4 control-label">Tokens required?</label>
          <div class="col-sm-5">
            <input name="tokens" type="tokens" class="form-control" id="inputTokens" placeholder="80, 30, 10...">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Location</label>
          <div class="col-sm-5">
            <select id="inputLocation" class="form-control">
              <option>Kista Galleria</option>
              <option>Electrum Building</option>
              <option>Ericsson Office</option>
              <option>Scandic Hotel</option>
              <option>Kista Science Tower</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12 text-center">
            <div id="map">
            </div>
            <script type="text/javascript">
            var latitude = 59.403143;
            var longitude = 17.946796;
            document.getElementById("inputLocation").onmouseup = function() {
              var loc = $("#inputLocation").val()
              switch (loc) {
                case 'Kista Galleria':
                latitude = 59.403143,
                longitude = 17.946796
                initMap(latitude, longitude);
                break;
                case 'Electrum Building':
                latitude = 59.404492,
                longitude = 17.950250
                initMap(latitude, longitude);
                break;
                case 'Ericsson Office':
                latitude = 59.405130,
                longitude = 17.955695
                initMap(latitude, longitude);
                break;
                case 'Scandic Hotel':
                latitude = 59.407232,
                longitude = 17.957786
                initMap(latitude, longitude);
                break;
                case 'Kista Science Tower':
                latitude = 59.401322,
                longitude = 17.946134
                initMap(latitude, longitude);
                break;
                default:
              }
            };
            </script>
            <script type="text/javascript">
            function initMap() {
              var uluru = {lat: latitude, lng: longitude};
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: uluru
              });
              var marker = new google.maps.Marker({
                position: uluru,
                map: map
              });
            }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM1JQUa5dC8IaIOWSCl927p_HZ8P_FM34&callback=initMap" async defer></script>
          </div>
          <div class="col-md-12 text-center"><input value="Sign Contract" type="button" id="sc" class="btn btn-default margin-top"></input></div>
        </div>
      </form>
    </div>
  </div> <!-- /container -->
</body>
</html>
