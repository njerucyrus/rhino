<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/06/2017
 * Time: 16:45
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Home</title>

    <?php include_once 'head_views.php'; ?>

    <script src="/public/assets/js/jquery-3.2.0.slim.min.js"></script>
    <script src="/public/assets/js/bootstrap.min.js"></script>
    <script src="/public/assets/js/jquery-1.11.3.min.js"></script>


    <style type="text/css">
        .bs-example {
            margin: 20px;
            padding-top: 7%;
        }

        .panel-title .glyphicon {
            font-size: 14px;
        }
    </style>
    <script>
        $(document).ready(function () {
            // Add minus icon for collapse element which is open by default
            $(".collapse.in").each(function () {
                $(this).siblings(".panel-heading").find(".glyphicon").addClass("glyphicon-minus").removeClass("glyphicon-plus");
            });

            // Toggle plus minus icon on show hide of collapse element
            $(".collapse").on('show.bs.collapse', function () {
                $(this).parent().find(".glyphicon").removeClass("glyphicon-plus").addClass("glyphicon-minus");
            }).on('hide.bs.collapse', function () {
                $(this).parent().find(".glyphicon").removeClass("glyphicon-minus").addClass("glyphicon-plus");
            });
        });
    </script>
</head>
<body>

<section id="header" class="bg-color0">
    <div class="container">
        <div class="row">

            <a class="navbar-brand" href="#top"><img src="../public/assets/img/logo4.png" alt=""></a>

            <div class="col-sm-12 mainmenu_wrap">
                <div class="main-menu-icon visible-xs"><span></span><span></span><span></span></div>
                <?php
                include_once 'header_menu_views.php';
                ?>
            </div>

        </div>
    </div>
</section>


<section id="links" class="grey_section">
    <div class="container">
        <div class="row">
            <div class="bs-example">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span
                                            class="glyphicon glyphicon-plus"></span> What is HTML?</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>HTML stands for HyperText Markup Language. HTML is the main markup language for
                                    describing the structure of Web pages. <a
                                            href="http://www.tutorialrepublic.com/html-tutorial/" target="_blank">Learn
                                        more.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span
                                            class="glyphicon glyphicon-plus"></span> What is Bootstrap?</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>Bootstrap is a powerful front-end framework for faster and easier web development. It
                                    is a collection of CSS and HTML conventions. <a
                                            href="http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/"
                                            target="_blank">Learn more.</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span
                                            class="glyphicon glyphicon-plus"></span> What is CSS?</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style
                                    properties for a given HTML element such as colors, backgrounds, fonts etc. <a
                                            href="http://www.tutorialrepublic.com/css-tutorial/" target="_blank">Learn
                                        more.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <p><strong>Note:</strong> Click on the linked heading text to expand or collapse accordion panels.</p>
            </div>
        </div>
    </div>
</section>

<!--footer scripts-->
<?php include_once 'footer_views.php'; ?>



</body>
</html>
