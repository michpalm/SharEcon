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
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="js\contract-calling.js"></script>

    <script type="text/javascript" src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script type="text/javascript">
    (function(){
      emailjs.init("user_oO0Mv06TlWtXYaM9F5de6");
    })();
    </script>

    <title>Home</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <script type="text/javascript">
          var username = '<?php echo $_SESSION["username"]; ?>'
          var password = '<?php echo $_SESSION["pass"]; ?>'
          var methodToCall = 'balance';
          call_contract(username, password, methodToCall);
        </script>
        <div class="col-md-12 text-center"><h1>Welcome <?php echo $_SESSION["username"]; ?> <br> Choose your action:</h1></div>
        <div class="col-md-12 text-center"><h2>Your current balance is, <div id="Balance"></div></h2></div>
        <div class="col-md-12 text-center"><a class="btn btn-default" href="services.php" role="button"><h4>Services</h4></a></div>
        <div class="col-md-12 text-center" id="transport" style="display: none"><input value="Finish delivery" type="button" id="done" class="btn btn-default margin-top"></input></div>

        <script type="text/javascript">
          //var transport = '<?php if(isset($_SESSION["transporting"])){echo $_SESSION["transporting"];}else{echo 'empty';}?>'
          var toEmail = '<?php if(isset($_SESSION["toEmail"])){echo $_SESSION["toEmail"];}else{echo 'empty';}?>'
          if(toEmail!='empty'){
            document.getElementById('transport').style.display = "block";
          }
          document.getElementById("done").onclick = function(){
            console.log(toEmail);
            var username = '<?php echo $_SESSION["username"]; ?>'
            var password = '<?php echo $_SESSION["pass"]; ?>'
            var methodToCall = 'transferDones';
            call_contract(username, password, methodToCall);
            emailjs.send("default_service","delivered",{to_email: toEmail})
            .then(
              function(response) {
                console.log("SUCCESS", response);
                <?php unset($_SESSION["toEmail"]) ?>
                window.location.replace("home.php");

              },
              function(error) {
                console.log("FAILED", error);
              }
            );
          };
        </script>
      </div>
    </div> <!-- /container -->

  </body>
</html>
