<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/14/17
 * Time: 11:16 AM
 */
require_once __DIR__ . '/../vendor/autoload.php';
$newPasswordErr = $confirmPasswordErr = $matchErr='';
$newPassword = $confirmPassword = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['newPassword'])) {
        $newPasswordErr = 'New Password is required';
    } else {
        $newPassword = cleanInput($_POST['newPassword']);
    }
    if (empty($_POST['confirmPassword'])) {
        $confirmPasswordErr = 'Confirm  Password is required';
    } else {
        $confirmPassword = cleanInput($_POST['newPassword']);
    }
    if($newPassword != $confirmPassword){
        //give the error
    }else{
        //do change of password.
    }

}

function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        .error {
            color: rgba(206, 25, 17, 0.82);
        }
    </style>
</head>
<body>
<div class="row">
    <div class="container-fluid">
        <div class="col col-md-6 col-md-offset-2">

            <div id="resetCodeForm">
                <div id="feedback"></div>
                <div class="panel">
                    <h3 class="panel-heading">Reset Password Step 2</h3>
                    <div class="panel-body">
                        <form class="form-inline">
                            <label for="resetCode" class="control-label">Password Reset Code</label>
                            <input type="text" name="resetCode" id="resetCode" placeholder="Enter 8 Digit Code Here">
                        </form>
                        <button id="btnSubmitCode" class="btn btn-primary" onclick="verifyCode()">Submit</button>
                    </div>
                </div>
            </div>


            <div id="resetPasswordForm">
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

                    <h3 class="panel-heading">Reset Password Step 3</h3>

                    <div class="panel-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"
                              class="form-group">
                            <label for="newPassword" class="control-label">New Password</label>
                            <input type="password" name="newPassword" id="newPassword" class="form-control" required>
                            <span class="error">*</span>

                            <label for="confirmPassword" class="control-label">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                                   required>
                            <span class="error">*</span>

                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer_views.php' ?>
<script>
    $(document).ready(function (e) {
        e.preventDefault;
        $('#resetPasswordForm').hide();
    })
</script>
<script>
    function verifyCode() {
        var url = 'reset_password_endpoint.php';
        var code = $('#resetCode').val();
        $.ajax(
            {
                type: 'POST',
                url: url,
                data: JSON.stringify({'resetCode': code}),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8',
                traditional: true,
                success: function (response) {
                    if (response.statusCode == 200) {
                        $('#resetPasswordForm').show();
                    } else {
                        $('#feedback').removeClass('alert alert-success')
                            .html('<div class="alert alert-danger alert-dismissable">' +
                                '<a href="#" class="close"  data-dismiss="alert" aria-label="close">&times;</a>' +
                                '<strong>Error! </strong> ' + response.message + '</div>');
                        $('#resetPasswordForm').show();
                    }
                }
            }
        )
    }
</script>
</body>
</html>