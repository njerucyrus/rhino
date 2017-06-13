<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/13/17
 * Time: 5:32 PM
 */
$message = '';
if(isset($_GET['status']) && $_GET['status']==200) {
    ?>
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>Account created successfully</p>
        <br>
        <p>You will receive a confirmation email once your account is approved</p>
    </div>

    <?php
}
?>
