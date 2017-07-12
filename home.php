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

    <title>Home</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <script type="text/javascript">
          var username = '<?php echo $_SESSION["username"]; ?>'
          call_contract(username);
        </script>
        <div class="col-md-12 text-center"><h1>Welcome <?php echo $_SESSION["username"]; ?> <br> Choose your action:</h1></div>
        <div class="col-md-12 text-center"><h2>Your current balance is, <div id="Balance"></div></h2></div>
        <div class="col-md-12 text-center"><a class="btn btn-default" href="services.php" role="button"><h4>Services</h4></a></div>
      </div>
    </div> <!-- /container -->

  </body>
</html>
