<?php

include "includes/db.php";
ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="dashboard.php" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <!--<button type="submit" class="btn btn-primary btn-block"></button>-->
              <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Sign In">

            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="https://www.facebook.com" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="https://www.google.com" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="recover-password.php">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="signup.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <?php

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hassedPass = sha1($password);
    $query = "SELECT * FROM employees WHERE username='$username'";

    $super_admin = mysqli_query($db, $query);
    //Read the data from the Database 
    if (!$super_admin) {
      die("Query failed. " . mysqli_error($db));
    } else {
      while ($row = mysqli_fetch_array($super_admin)) {
        $db_employee_id  = $row['employee_id'];
        $db_fullname     = $row['fullname'];
        $db_username     = $row['username'];
        $db_password     = $row['password'];
        $db_email        = $row['email'];
        $db_image       =  $row['image'];
      }
    }

    //user validation
    if ($username != $db_username && $hassedPass != $db_password) {

      header("location : index.php");
    } else if ($username == $db_username && $hassedPass == $db_password) {
      header("location : dashboard.php");

      $_SESSION['employee_id']  = $db_employee_id;
      $_SESSION['fullname']     = $db_fullname;
      $_SESSION['username']     = $db_username;
      $_SESSION['password']     = $db_password;
      $_SESSION['email']        = $db_email;
      $_SESSION['image']        = $db_image;
    } else {
      header("location : index.php");
    }
  }
  ?>


  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <?php
  ob_end_flush();
  ?>
</body>

</html>