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
        <div class="col-md-12 text-center"><h1>Select your service:</h1></div>
        <div class="col-md-12 text-center"><a class="btn btn-default" href="me2me.php" role="button"><h4>Me 2 Me</h4></a></div>
        <div class="col-md-12 text-center"><a class="btn btn-default" href="share-book.php" role="button"><h4>Share/Book Item</h4></a></div>
        <div class="col-md-12 text-center"><a class="btn btn-default" href="deliver.php" role="button"><h4>Deliver</h4></a></div>
      </div>
    </div> <!-- /container -->

  </body>
</html>
