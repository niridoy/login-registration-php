<?php

session_start();

  if(isset($_SESSION["is_admin"])) {
      header('Location: home.php');
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="functions/login.php">
      <h1 class="h3 mb-3 font-weight-normal">Log In</h1>
      <label for="inputEmail" class="sr-only">User ID</label>
      <input type="text" id="inputEmail" name="user_name" class="form-control" placeholder="Enter User ID" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <?php 
        if(isset($_SESSION["success"])) {
          unset($_SESSION["success"]);
          echo '<div class="alert alert-danger mt-2" role="alert">
            User ID & Password Invalid !
          </div> ';
        }
      ?> 
    </form>

  </body>
</html>
