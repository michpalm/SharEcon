<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <title>Login</title>
  </head>
  <body>

    <div class="container">
      <?php

      if(isset($_GET["success"])) echo
      '
      <script>
          alert("User succesfully created!");
      </script>
      ';

       ?>
      <form class="form-horizontal" action="login-check.php" method="POST" role="form">
        <h1 class="form-horizontal text-center">SharEcon</h1>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="username" type="username" id="inputUsername" class="form-control margin-top" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control margin-top" placeholder="Password" required>
        <div class="col-md-12 text-center"><button class="btn btn-default margin-top" type="submit"> <h4>Log in</h4></button></div>
        <div class="col-md-12 text-center"><a class="btn btn-default" href="register.php" role="button"><h4>Register</h4></a></div>

      </form>

    </div> <!-- /container -->
  </body>
</html>
