<?php

//My KEY 48e599b568554a1e9ade3a9c7a41fcff

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
          <label class="col-sm-4 control-label">Origin</label>
          <div class="col-sm-5">
            <select id="inputOrigin" class="form-control">
              <option value="3753">Grönlandsgången</option>
              <option value="59.407439, 17.957688">Kistagången</option>
              <option value="Helenelund station">Helenelund station</option>
              <option value="Kista Jan Stenbecks torg">Jan Stenbecks torg</option>
              <option value="9302">Kista Centrum</option>
            </select>
          </div>
          <label class="col-sm-4 control-label">Destination</label>
          <div class="col-sm-5 margin-top">
            <select id="inputDestination" class="form-control">
              <option value="9302">Kista Centrum</option>
              <option value="3753">Grönlandsgången</option>
              <option value="59.407439, 17.957688">Kistagången</option>
              <option value="Helenelund station">Helenelund station</option>
              <option value="Kista Jan Stenbecks torg">Jan Stenbecks torg</option>
            </select>
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

            var origin = 'originId=' + $("#inputOrigin").val();
            var destination = 'destId=' + $("#inputDestination").val();

            $.ajax({
              type: "POST",
              url: "http://api.sl.se/api2/TravelplannerV2/trip.json?key=48e599b568554a1e9ade3a9c7a41fcff&" + origin + "&" + destination,
              dataType: 'JSON',
              contenType: 'text/plain',
              processData: true,
              async: true,
              success: function (result){
                console.log(result);
                console.log("success!");
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
              }
            });

            </script>
          </div>
          <div class="col-md-12 text-center"><input value="Sign Contract" type="button" id="sc" class="btn btn-default margin-top"></input></div>
        </div>
      </form>
    </div>
  </div> <!-- /container -->
</body>
</html>
