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
  <script src="js\contract-calling.js"></script>

  <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
  <script type="text/javascript">
  (function(){
    emailjs.init("user_oO0Mv06TlWtXYaM9F5de6");
  })();
  </script>

  <title>Deliver</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center"><h1>Pick box to deliver</h1></div>
      <form class="form-horizontal">
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
        <div class="form-group" id="radioGroup" style="display: none">
          <div class="optionsDiv">
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios1" value="micpa@kth.se">
              <b>Box #1 - Hat for 100 tokens</b>
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios2" value="tom.abin@gmail.com">
              <b>Box #2 - Cat for 100 tokens</b>
            </label>
          </div>
          <div class="radio disabled">
            <label>
              <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
              <b>Box #5 - Hammer for 100 tokens</b>
            </label>
          </div>
        </div>
        </div>
            <script type="text/javascript">

            //Checks for changes in the route fields
            //If the route matches Kistagången to Grönlandsgången it shows 3 boxes
            //Simulating a case where the users route matches the box route
            var onChangeHandler = function() {
               var origin = document.getElementById('inputOrigin').value;
               var destination = document.getElementById('inputDestination').value;

              if (origin=='59.407439, 17.957688' && destination=='59.405046, 17.952489') {
                console.log("Correct route");
                document.getElementById('radioGroup').style.display = "block";
              } else {
                document.getElementById('radioGroup').style.display = "none";
              }

            };
            document.getElementById('inputOrigin').addEventListener('change', onChangeHandler);
            document.getElementById('inputDestination').addEventListener('change', onChangeHandler);

            </script>
          </div>
          <div class="col-md-12 text-center"><input value="Deliver" type="button" id="dlvr" class="btn btn-default margin-top"></input></div>
          <script type="text/javascript">

            //Sends email to "owner" of the box being deliverd to update on status
            //Currently does not post any contract call from Cumulus
            var username = '<?php echo $_SESSION["username"]; ?>'
            var password = '<?php echo $_SESSION["pass"]; ?>'

            var methodToCall = 'balance';
            document.getElementById("dlvr").onclick = function(){

              //Selects email included in the value of the box fileds
              //Simulates fetching email to "owner" of the box to be delivered
              var toEmail = document.querySelector('input[name="optionsRadios"]:checked').value;

              console.log("Sending to: " + toEmail);
              emailjs.send("default_service","in_transit",{to_email: toEmail})
              .then(
                function(response) {
                  console.log("SUCCESS", response);
                  jQuery.ajax({
                    url: 'pass-email.php',
                    type: 'POST',
                    data: {
                      "data":toEmail
                    },
                    success: function(result) {
                      console.log("Pass email said: " + result);
                      console.log("its done!!!!");
                      window.location.replace("home.php");
                    },
                    error: function(xhr, textStatus, errorThrown) {
                      console.log(textStatus.reponseText);
                    }
                  });

                },
                function(error) {
                  console.log("FAILED", error);
                }
              );

              //Not in use currently
              //call_contract(username, password, methodToCall);
            };
          </script>
        </div>
      </form>
    </div>
  </div> <!-- /container -->
</body>
</html>
