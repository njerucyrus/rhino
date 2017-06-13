<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/13/17
 * Time: 10:22 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
use \App\Controller\UserController;
use \App\Controller\FundController;
$userId = UserController::getUserId($_SESSION['username']);
$profile = FundController::myEarning($userId);
?>
<section id="profile">
    <div class="panel">
        <h3 class="panel-heading">Account Info</h3>
        <div class="panel-body">
            Name : <p><?php echo $profile['fullName'] ?></p><br>
            Phone Number: <p><?php echo $profile['phoneNumber']?></p><br>
            Email: <p><?php echo $profile['email']?></p><br>
            Date Joined: <p><?php echo $profile['createdAt']?></p><br>
            Total Earning: <p><?php echo $profile['totalEarning']?></p><br>
            Account Balance: <p><?php echo $profile['balance']?></p><br>
        </div>
    </div>
</section>


