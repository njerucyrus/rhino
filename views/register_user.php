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
                <?php //include 'header_menu_views.php' ?>
                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title col-md-offset-3">

                            <?php
                            if (empty($success_msg) && !empty($error_msg)) {
                                ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $error_msg ?>
                                </div>
                                <?php
                            } elseif (empty($error_msg) and !empty($success_msg)) {
                                ?>
                                <div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $success_msg ?>
                                </div>

                                <?php
                            } else {
                                echo "";
                            }
                            ?>
                            <h1>Join Us</h1>
                        </div>


                    </div>

                    <div class="panel-body">

                        <form role="form" class="form-horizontal form-groups-bordered" method="post"
                              action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

                            <div class="form-group">
                                <label for="userReferralCode" class="col-sm-3 control-label">Referral Code</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="userReferralCode" placeholder="Referral Code" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fullName" class="col-sm-3 control-label">Full Name</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idNo" class="col-sm-3 control-label">ID Number</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="idNo" placeholder="ID Number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phoneNumber" class="col-sm-3 control-label">Phone Number</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">Email</label>

                                <div class="col-sm-5">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="userName" class="col-sm-3 control-label">UserName</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="username" placeholder="Username"
                                           required>
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>

                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                           required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm" class="col-sm-3 control-label">Confirm Password</label>

                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm"
                                           placeholder="Confirm Password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="paymentOption"  class="col-sm-3 control-label">Payment Option</label>
                                <div class="col-sm-5">
                                <select id="paymentOption" name="paymentStatus" class="form-control">
                                    <option value="mpesa">M-Pesa</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                                </div>

                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">

                                    <input type="submit" name="submit" value="Register User"
                                           class="btn btn-primary btn-lg btn-block "/>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php include 'footer_views.php'?>
    <script src="../public/assets/js/jquery-1.11.3.min.js"></script>
    <script src="../public/assets/js/bootstrap.min.js"></script>
</body>
</html>
