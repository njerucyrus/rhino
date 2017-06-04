<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 06/05/2017
 * Time: 22:22
 */
require_once  '../vendor/autoload.php';
include 'includes/register_user.inc.php';
?>
<!DOCTYPE html>
<html>
<?php include 'head_views.php' ?>
<body class="page-body skin-facebook">
<div class="page-container">

    <div class="main-content">
        <div class="row">
            <div class="col-md-12">

<div id="login-overlay" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Welcome back to <img src="../public/assets/img/logo.png"></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="well">
                        <form id="loginForm" method="POST" action="/login/" novalidate="novalidate">
                            <div class="form-group">
                                <label for="username" class="control-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                <span class="help-block"></span>
                            </div>
                            <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>

                            <button type="submit" class="btn btn-success btn-block">Login</button>

                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="lead">Register now </p>
                    <ul class="list-unstyled" style="line-height: 2">
                        <li><span class="fa fa-check text-success"></span> Get access to e-learning resources</li>
                        <li><span class="fa fa-check text-success"></span> Get guidance on career choices</li>
                        <li><span class="fa fa-check text-success"></span> Acquire the right skills</li>
                        <li><span class="fa fa-check text-success"></span> Get access to learning opportunities</li>

                    </ul>
                    <p><a href="../index2.php#join_us" class="btn btn-info btn-block">Yes please, register now</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
</body>
</html>