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
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="..\js\contract-calling.js"></script>

    <title>Resgister</title>
  </head>
  <body>
    <div class="container">

      <div class="col-md-12 text-center"><h1>Create your account</h1></div>
      <form class="form-horizontal" method="POST" role="form">
        <div class="form-group">
          <label for="username" class="col-sm-4 control-label">Username</label>
          <div class="col-sm-5">
            <input type="user" class="form-control" id="newUser" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-4 control-label">Email address</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="newEmail" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="card" class="col-sm-4 control-label">Password</label>
          <div class="col-sm-5">
            <input type="card" class="form-control" id="newPassword" placeholder="Password">
          </div>
        </div>
        <div class="col-md-12 text-center"><input value="Confirm" type="button" id="confirm" class="btn btn-default margin-top"></input></div>
        <script type="text/javascript">
          var username = 'new';
          var password = 'new';
          var methodToCall = 'register';
          document.getElementById("confirm").onclick = function(){call_contract(username, password, methodToCall);};
        </script>
        </form>

    </div> <!-- /container -->

  </body>
</html>
