<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/14/17
 * Time: 11:17 AM
 */
require_once __DIR__ . '/../vendor/autoload.php';
use \App\Auth\Auth;
use \App\Controller\ReferralTreeController;
use \App\Mailer\SendEmail;

$error = $success = '';

if (!empty($_POST['email'])) {
    //check if email exists in our records
    $exists = Auth::checkEmail($_POST['email']);
    if ($exists) {
        //generate password reset code
        $resetCode = ReferralTreeController::generateReferralCode(8);
        $_SESSION['resetCode'] = $resetCode;
        //send email containing the reset code.
        $sender = 'info@hudutech.com';
        $to = $_POST['email'];
        $mail = new SendEmail($to, $sender);
        $mail->setVendor('Asili Africa');
        $mail->setMessage("Your Password Reset Code is {$_SESSION['resetCode']}");
        if($mail->send()){
            $success .= "Submitted Successfully Check you mail inbox";
            header('Refresh: 3;url=reset_password.php');
        }

    } else {
        $error .= 'Email you entered does not exist in our records';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
<div class="row">
    <div class="container-fluid">
            <div class="col col-md-6 col-md-offset-2">
                <div class="panel">
                    <?php if ($error != ''): ?>
                        <div class="has-error">
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $error; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($success != ''): ?>
                        <div>
                            <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $success; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h3 class="panel-heading">Reset Password Step 1</h3>
                    <div class="panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"
                              class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" name="email" id="email" placeholder="Enter the email you signed up with"
                                  class="form-control" required>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include 'footer_views.php'?>
</body>
</html>
