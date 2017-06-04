<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/1/17
 * Time: 10:41 AM
 */
require_once __DIR__.'/vendor/autoload.php';

$referralCode = 500;
use \App\Entity\User;
use \App\Controller\UserController;
use \App\Controller\ReferralTreeController;
$user = new User();
$user->setUsername('cyrus njeru 136');
$user->setPassword('secret');
$user->setFullName("njeru cyrus");
$user->setCreatedAt(date('Y-m-d H:i:s'));
$user->setAccountStatus('active');
$user->setEmail('mail@example.com');
$user->setIdNo('3844484');
$user->setLastLogin(date('Y-m-d H:i:s'));
$user->setLoginIp($_SERVER['REMOTE_ADDR']);
$user->setPhoneNumber(38484844);
$user->setPaymentStatus('paid');
$user->setUserReferralCode($referralCode);
$userCtrl = new UserController();
$created = $userCtrl->create($user);
if($created){
$refTree = ReferralTreeController::createReferralTree(12, $referralCode, '300');
if($refTree){
    $updated = ReferralTreeController::updateReferralTree($referralCode);
    if($updated) {
        $debited = ReferralTreeController::debitAccounts($referralCode);
        if($debited){
            echo "earning done";
        }else{
            echo "error in earning";
        }
    }else{
        echo "error n updating rtree";
    }
    echo "DONE";
}else{
    echo "got error in tree";
}
}




