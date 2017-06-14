<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/13/17
 * Time: 11:04 PM
 */

require_once __DIR__.'/../vendor/autoload.php';
use \App\Controller\SiteController;
$counter=1;
$sites = SiteController::all();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="../public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../public/assets/css/main.css">

    <link rel="stylesheet" href="../public/assets/css/custom.css">
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
                <h1 class="block-header">E-learning Websites</h1>
                <h3>Here is a list of the best E-learning websites</h3>
            </div>
        </div>

        <div class="row">

            <div class="block col-sm-8 col-sm-offset-2">
                <table class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Website</th>
                        <th>Description</th>
                        <th>Visit website</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($sites as $site):?>
                    <tr>
                        <th scope="row"><?php echo $counter?></th>
                        <td><?php echo $site['url']?></td>
                        <td><?php echo $site['description'] ?></td>
                        <td><a href="<?php echo $site['url']?> " target="_blank"><button type="button" class=" btn-sm btn-primary" style="text-align: center;">Visit</button></a> </td>
                    </tr>
                        <?php $counter++?>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>




        </div>
    </div>
</section>



<section id="contact" class="darkgrey_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="block-header">Contact Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, doloremque rerum molestias veritatis dolor nostrum omnis ullam voluptatem fugit velit! Inventore, ullam omnis itaque fuga optio beatae esse odio vero?</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="contact-form">
                    <form class="contact-form" method="post" action="/">
                        <p class="contact-form-name">
                            <label for="name">Name <span class="required">*</span></label>
                            <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Name">
                        </p>
                        <p class="contact-form-email">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email">
                        </p>
                        <p class="contact-form-message">
                            <label for="message">Comment</label>
                            <textarea aria-required="true" rows="8" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
                        </p>
                        <p class="contact-form-submit text-center vertical-margin-81">
                            <input type="submit" value="Send" id="contact_form_submit" name="contact_submit" class="theme_btn">
                        </p>
                    </form>
                </div>
            </div>

            <div class="block widget_text col-sm-3">
                <h3>About Us</h3>
                <p>Company Name.<br>
                    City, Street str., ZIP<br>
                    <span><strong>Phone:</strong> </span>(123) 456-7890<br>
                    <span><strong>Email:</strong> </span>
                    <a href="#">info@company.com</a><br>
                    We provide original, quality, attractive and functional design.
                </p>
                <p>
                    <a class="socialico-twitter" href="#" title="Twitter">#</a>
                    <a class="socialico-facebook" href="#" title="Facebook">#</a>
                    <a class="socialico-google" href="#" title="Google">#</a>
                    <a class="socialico-linkedin" href="#" title="Lindedin">#</a>
                    <a class="socialico-tumblr" href="#" title="tumblr">#</a>
                    <a class="socialico-rss" href="#" title="Rss">#</a>
                </p>
            </div>

            <div class="block widget_nav_menu col-sm-3">
                <h3>Useful Links</h3>
                <ul class="nav menu">
                    <li><a href="#title_about">About Us</a></li>
                    <li><a href="#join_us">Join Us</a></li>
                    <li><a href="#mainslider">Login Us</a></li>

                </ul>
            </div>


        </div>
    </div>
</section>



</body>
</html>