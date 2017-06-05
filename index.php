<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/1/17
 * Time: 10:41 AM
 */
require_once __DIR__.'/vendor/autoload.php';

$referralCode = 6000;
use \App\Entity\User;
use \App\Controller\UserController;
use \App\Controller\ReferralTreeController;
$user = new User();
$user->setUsername(mt_rand(0, 1000));
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
$refTree = ReferralTreeController::createReferralTree(12, $referralCode,600);
$updated = ReferralTreeController::updateReferralTree($referralCode);
ReferralTreeController::createReferralCodeEarning(12, $referralCode);
ReferralTreeController::createReferralCodeCounts($referralCode);

$updated = ReferralTreeController::updateReferralTree($referralCode);
print_r(ReferralTreeController::debitAccounts($referralCode));
ReferralTreeController::updateTotalEarning();




//$l1Code = ReferralTreeController::getL1($referralCode);


$levels = ReferralTreeController::getTree($referralCode);

print_r($levels);



