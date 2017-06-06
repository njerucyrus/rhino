<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 04/06/2017
 * Time: 16:45
 */
require_once '../vendor/autoload.php';
$sites = \App\Controller\SiteController::all();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Home</title>

    <?php include_once 'head_views.php'; ?>




    <style type="text/css">
        .bs-example {
            margin: 20px;


        }

        .panel-title .glyphicon {
            font-size: 14px;
        }
        button.accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        button.accordion.active, button.accordion:hover {
            background-color: #ddd;
        }

        button.accordion:after {
            content: '\002B';
            color: #777;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        button.accordion.active:after {
            content: "\2212";
        }

        div.panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }
    </style>

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
        <div class="row bs-example">
            <div class="col-sm-12 text-center">
                <h2 class="block-header">E-learning Websites</h2>
                <h3></h3>
            </div>
            <button class="accordion">Section 1</button>
            <div class="panel">
                <div class="panel-body" style="color: red;">
                    Lorem ipsum...djsdsdjdjkd
                </div>
            </div>

            <button class="accordion">Section 2</button>
            <div class="panel">

                <div class="panel-body">
                <p>Lorem ipsum...</p>

                </div>
            </div>

            <button class="accordion">Section 3</button>
            <div class="panel">
                <div class="panel-body">
                    <p>Lorem ipsum...</p>

                </div>
            </div>
        </div>
    </div>
</section>


<!--footer scripts-->
<?php include_once 'footer_views.php'; ?>

<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        }
    }
</script>

</body>
</html>
