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

    <a class="navbar-brand" href="#top"><img src="../public/assets/img/logo4.png" alt=""></a>
    <div class="col-sm-12 mainmenu_wrap"><div class="main-menu-icon visible-xs"><span></span><span></span><span></span></div>

        <?php
                include_once 'header_menu_views.php';
                ?>
    </div>
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

<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 15/06/2017
 * Time: 00:42
 */
?>

<section class="title_sectionk" id="title_about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12  text-center">
                <h3 class="block-header">About Us</h3>
                <h3></h3>
            </div>
        </div>
        <div class="col-sm-12 desktop-hide-introm">

            <h3> We are an independent private organization that has been set up to
                campaign, create awareness, partner and offer consultancy services for the E-learning services in
                Africa.</h3>
        </div>
        <div class="row">

            <div class="col-sm-4">
                 <img src="../public/assets/img/elearning.jpg" onerror="this.style.display='none' alt="." class="img-circle">
            </div>
            <div class="col-sm-8">
                <div>
                    <h4 style="text-align: center;"><i class="rt-icon-link-outline" ></i></h4>
                    <h4 style="text-align: center;"> We compile innovative e-learning programs, services and experiences, designed to bring your professional and personal life in alignment with your educational needs at your pace.</br></br></h4>
                </div>

                <div>
                    <h4 style="text-align: center;"><i class="rt-icon-graduate"></i> </h4>
                    <h4>We offer guidance on career choices across all levels educational needs within communities with individuals and families, organizations and industries.<br><br></h4>

                </div>


                <div>
                    <h4 style="text-align: center;"><i class="rt-icon-support"></i> </h4>
                    <h4>We assist, individuals and organizations acquire the right skills set to be on the knowledgeable edge with the fast evolving Internet opportunities in the global society.<br> <br> </h4>
                </div>
            </div>
        </div></div>
</section>
<section id="features" class="color_section">
    <div class="container">

        <div class=" row">
            <div >
                <h3><i class="rt-icon-megaphone" style="font-size: 50px;"></i>
                We campaign, create awareness, partner and offer consultancy services for the E-learning services. </div>

        </div>


    </div>


    </div>
</section>


<section id="services" class="grey_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="block-header">Our Objectives</h2>
                <h3></h3>
            </div>
        </div>

        <div class="row">

            <div class="block col-sm-3">
                <div class="single_teaser icons style1">
                    <div class="icons_introimg image-icon">
                        <i class="rt-icon-graduate"></i>
                    </div>
                    <h3><a href="#">Enhance access to education</a></h3>
                    <p class="introtext">By providing access to learning opportunities through a non-formal, community-based e-learning program as an alternative means of education for youths and adults who are unable to avail through the formal school system</p>

                </div>
            </div>
            <div class="block col-sm-3">
                <div class="single_teaser icons style1">
                    <div class="icons_introimg image-icon">
                        <i class="rt-icon-cog2"></i>
                    </div>
                    <h3><a href="#">Orientation and reduce the digital divide</a></h3>
                    <p class="introtext">Orient the existing educators on the effective use of e-learning resources and  reduce the digital divide by providing access to ICT for disadvantaged youth and adults in Africa.</p>

                </div>
            </div>
            <div class="block col-sm-3">
                <div class="single_teaser icons style1">
                    <div class="icons_introimg image-icon">
                        <i class="rt-icon-support"></i>
                    </div>
                    <h3><a href="#">Support </a></h3>
                    <p class="introtext">Support the efforts of the government to effectively integrate e-learning in the teaching and learning processes and support the development of relevant 21st Century skills.</p>

                </div>
            </div>
            <div class="block col-sm-3">
                <div class="single_teaser icons style1">
                    <div class="icons_introimg image-icon">
                        <i class="rt-icon-device-laptop"></i>
                    </div>
                    <h3><a href="#">Avail option of interactive e-learning platforms</a></h3>
                    <p class="introtext">Research and avail option of interactive e-learning platforms for out-of-school youth  and adults through relevant and interactive computer-based multimedia learning resources</p>

                </div>
            </div>

        </div>
    </div>
</section>



<?php include_once 'contact_footer_views.php';?>

<script src="../public/assets/js/jquery-1.11.3.min.js"></script>
<script src="../public/assets/js/bootstrap.min.js"></script>

</body>
</html>