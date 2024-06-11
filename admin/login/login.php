<?php 
session_start();
ob_start();
include_once '../inc/dbconnect.php';
if (isset($_POST['submit'])){
  $user = $mysqli->real_escape_string($_POST['user']);
  $pass = $mysqli->real_escape_string($_POST['pass']);
$queryUser = "SELECT * FROM admin WHERE username = '{$user}' && password = '{$pass}'";
$resultUser = $mysqli->query($queryUser);
$arUser = mysqli_fetch_assoc($resultUser);
if(is_array($arUser) && (count($arUser))>0){
  $_SESSION['username'] = $arUser['username'];
  $_SESSION['HoTen'] = $arUser['HoTen'];
  
  header("LOCATION: ../index.php");
  exit();
}else{
  //echo "<p class='error'>Sai username hoặc password</p>";
  $error = "<p>Sai username hoặc password</p>";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login Page | Materialize - Material Design Admin Template</title>

  <!-- Favicons-->
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- Custome CSS-->    
  <link href="css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <!-- CSS style Horizontal Nav (Layout 03)-->    
  <link href="css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
  <style type="text/css">
    #submit{
      background: #FF4081;
      color: #fff;
      display: block;
      margin: 0 auto;
      padding: 8px 0;
      width: 250px;
      border: none;
    }

    #submit:hover {
      background: #FF5A92;
    }
  </style>
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">  
            <input id="username" type="text" name="user">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <input id="password" type="password" name="pass">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <label>
          <?php
            if (isset($error)) {
              echo $error;
            }
          ?>
          </label>

        </div>
        <div class="row">
          <div class="input-field col s12">
            <input type="submit" value="LOGIN" name="submit" id="submit" />
          </div>
        </div>
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.js"></script>

</body>


<!-- Mirrored from demo.geekslabs.com/materialize/v2.1/layout03/user-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Aug 2015 16:06:31 GMT -->
</html>