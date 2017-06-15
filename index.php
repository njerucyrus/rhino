<?php
session_start();
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */
require_once  'vendor/autoload.php';
include "views/includes/signup.inc.php";
include "views/includes/login.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
    <?php include_once 'views/head.php' ?>
    </head>
    <body><div id="top"></div>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<section id="header" class="bg-color0">
    <div class="container"><div class="row">

      <a class="navbar-brand" href="#top"><img src="public/assets/img/logo4.png" alt=""></a>

      <div class="col-sm-12 mainmenu_wrap"><div class="main-menu-icon visible-xs"><span></span><span></span><span></span></div>
          <?php
          include_once 'views/header_menu.php';
          ?>
      </div>
      
    </div></div>
</section>


<section id="mainslider"   >
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="containerLogin">

        <div class="row tagLogin mobile-hide">
            <div class="col-md-12">

                <form class="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                        <label class="sr-only" for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <input type="password" name="username" class="form-control" id="password" required>
                        <div class="help-block text-right"><a href="views/forgot_password.php">Forgot the password ?</a></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Sign in">
                    </div>
                    <div class="checkbox">
                        <label for="keepLoggedIn">
                            <input type="checkbox" name="keepLoggedIn" id="keepLoggedIn"> keep me logged-in
                        </label>
                    </div>
                </form>
            </div>
            <div class="bottom text-center">
                New here ? <a href="#join_us"><b>Join Us</b></a>
            </div>
        </div>
        <div class="tagIntro mobile-hide-intro">
            <h3>We create awareness, campaign,  partner and offer consultancy services for the E-learning services in
                Africa.</h3>
        </div>
        <img src="public/assets/img/bg2.jpg">
    </div>

</section>

<div id="box_wrap">


<?php include_once 'views/about_inc.php'?>
<section id="join_us" class="grey_section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
          <h2 class="block-header">Join Us</h2>
          <p>Please fill the information below to join us.</p>
          <?php
          if (empty($success) && !empty($error)) {
              ?>
              <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $error?>
              </div>
              <?php
          } elseif (empty($error) and !empty($success)) {
              ?>
              <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo $success ?>
              </div>

              <?php
          } else {
              echo "";
          }
          ?>
        </div>
      </div>

  <div class="row">
      <?php include 'views/signup.php' ?>
  </div>
  </div>
</section>



<section class="title_section color_section">
  <div class="container"><div class="row">
    <div class="col-sm-8">
      <h3>“The education delivery approach in Africa has to shift from one that is highly dependent on physical infrastructure such as schools and colleges, physical learning materials, and in class education delivery to one that makes extensive use of interactive education technology.” Ambient Insight</h3>
     </div>
    <div class="col-sm-4">
      <a href="#" class="theme_btn"><i class="rt-icon-ok"></i> Join Us</a>
    </div>
  </div></div>
</section>

<?php include_once 'views/contact_footer_views.php';?>

<section id="copyright" class="dark_section">
  <div class="container"><div class="row">
    
    <div class="col-sm-12"><p class="text-center">&copy; Copyright 2017. Developed by <a href="http://hudutech.com" target="_blank">Hudutech Solutions</a></p></div>

  </div></div>
</section>

</div><!-- EOF #box_wrap -->

<div id="gallery_container"></div>

<div class="preloader">
  <div class="preloaderimg"></div>
</div>

  
<!--footer scripts-->
    <?php include_once 'views/footer.php';?>

    <script src="/public/assets/js/jquery-1.11.3.min.js"></script>
    <script src="/public/assets/js/bootstrap.min.js"></script>

       
    </body>
</html>