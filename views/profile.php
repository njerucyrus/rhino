<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/13/17
 * Time: 10:22 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
use \App\Controller\UserController;
use \App\Controller\FundController;
$userId = UserController::getUserId($_SESSION['username']);
$profile = FundController::myEarning($userId);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../public/assets/css/main.css">

    <link rel="stylesheet" href="../public/assets/css/custom.css">
    <link rel="stylesheet" href="../public/assets/css/profile.css">
</head>
<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->

<section id="header" class="bg-color0">
    <div class="container"><div class="row">

            <a class="navbar-brand" href="#top"><img src="../public/assets/img/logo4.png" alt=""></a>

            <div class="col-sm-12 mainmenu_wrap"><div class="main-menu-icon visible-xs"><span></span><span></span><span></span></div>
                <?php
                include_once 'header_menu_views.php';
                ?>
            </div>

        </div></div>
</section>




<section id="services" class="grey_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <br/>
                <h1 class="block-header">Profile</h1>
                <h3></h3>
            </div>
        </div>







    </div>

    <!-- nav bar -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="mail-compose.html" class="btn btn-danger btn-block btn-compose-email">Compose Email</a>
                <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
                    <li class="active">
                        <a href="#mail-inbox.html">
                            <i class="fa fa-inbox"></i> Inbox  <span class="label pull-right">7</span>
                        </a>
                    </li>
                    <li>
                        <a href="#mail-compose.html"><i class="fa fa-envelope-o"></i> Send Mail</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-certificate"></i> Important</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">35</span>
                        </a>
                    </li>
                    <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
                </ul><!-- /.nav -->

                <h5 class="nav-email-subtitle">More</h5>
                <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-open"></i> Promotions  <span class="label label-danger pull-right">3</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-open"></i> Job list
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-folder-open"></i> Backup
                        </a>
                    </li>
                </ul><!-- /.nav -->
            </div>
            <div class="col-sm-9">

                <!-- resumt -->
                <div class=" panel-default">
                    <div class="panel-heading resume-heading">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="col-xs-12 col-sm-4">
                                    <figure>
                                        <img class="img-circle img-responsive" alt="" src="../public/assets/img/default-profile-picture.jpg">
                                    </figure>

                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <ul class="list-group">
                                        <li class="list-group-item"> Name : <?php echo $profile['fullName'] ?></li>
                                        <li class="list-group-item"> Phone Number: <?php echo $profile['phoneNumber']?></li>
                                        <li class="list-group-item"> Email: <?php echo $profile['email']?></li>
                                        <li class="list-group-item"> Date Joined: <?php echo $profile['createdAt']?></li>
                                        <li class="list-group-item"> Total Earning: <?php echo $profile['totalEarning']?></li>
                                        <li class="list-group-item"> Account Balance: <?php echo $profile['balance']?></li>
                                       </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 bs-callout bs-callout-danger">
                        <h4>Users Referred</h4>
                        <div class="col-md-2 bs-callout bs-callout-danger">
                            <h4>Level 1</h4>
                            <h3>
                                5
                            </h3>
                        </div>
                        <div class="col-md-2 bs-callout bs-callout-danger">
                            <h4>Level 2</h4>
                            <h3>
                                10
                            </h3>
                        </div>
                        <div class="col-md-2 bs-callout bs-callout-warning">
                            <h4>Level 3</h4>
                            <h3>
                                25
                            </h3>
                        </div>
                        <div class="col-md-2 bs-callout bs-callout-warning">
                            <h4>Level 4</h4>
                            <h3>
                                16
                            </h3>
                        </div>
                        <div class="col-md-2 bs-callout bs-callout-info">
                            <h4>Level 5</h4>
                            <h3>
                                5
                            </h3>
                        </div>
                        <div class="col-md-2 bs-callout bs-callout-info">
                            <h4>Level 6</h4>
                            <h3>
                                1000
                            </h3>
                        </div>

                    </div>




                </div>
                <div class="bs-callout bs-callout-danger">
                    <h4>Referral system up to the 6th generation</h4>
                    <table class="table table-striped table-responsive ">
                        <thead>
                        <tr>
                            <th>Generation</th>
                            <th>Number of People</th>
                            <th>Payments in percentages</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>You</td>
                            <td>1</td>
                            <td> 0% </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>5</td>
                            <td> 20 </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>25</td>
                            <td>15% </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>125</td>
                            <td> 10%</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>625</td>
                            <td>5% </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>3125</td>
                            <td> 3%</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>15625</td>
                            <td> 2%</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- resume -->

        </div>
    </div>


</section>
<?php include_once 'contact_footer_views.php';?>

</body>
</html>
