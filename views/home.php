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

    <?php include_once 'head_views.php' ?>
</head>
<body>
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


<!--footer scripts-->
<?php include_once 'footer_views.php';?>

<script src="/public/assets/js/jquery-1.11.3.min.js"></script>
<script src="/public/assets/js/bootstrap.min.js"></script>

</body>
</html>
