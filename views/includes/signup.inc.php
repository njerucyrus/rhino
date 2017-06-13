<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/12/17
 * Time: 10:40 PM
 */
use \App\Entity\User;
use \App\Controller\UserController;
use \App\Controller\ReferralTreeController;
$error = '';
$success = '';
$_SESSION['referralCode'] = ReferralTreeController::generateReferralCode();
if (isset($_POST['fullName']) &&
    isset($_POST['idNo']) &&
    isset($_POST['phoneNumber']) &&
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirmPassword'])
) {
    if ($_POST['password'] == $_POST['confirmPassword']) {
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setFullName($_POST['fullName']);
        $user->setCreatedAt(date('Y-m-d H:i:s'));
        $user->setAccountStatus('active');
        $user->setEmail($_POST['email']);
        $user->setIdNo($_POST['idNo']);
        $user->setLastLogin(date('Y-m-d H:i:s'));
        $user->setLoginIp($_SERVER['REMOTE_ADDR']);
        $user->setPhoneNumber($_POST['phoneNumber']);
        $user->setPaymentStatus('paid');
        $user->setUserReferralCode($_SESSION['referralCode']);
        $userCtrl = new UserController();
        $created = $userCtrl->create($user);
        if ($created) {
            $id = ReferralTreeController::getUserId($_SESSION['referralCode']);
            if(isset($_POST['referralCode'])) {
                $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode'], $_POST['referralCode']);
            }elseif(!isset($_POST['referralCode'])){
                $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode']);
            }
            ReferralTreeController::createReferralCodeEarning($id, $_SESSION['referralCode']);
            ReferralTreeController::createReferralCodeCounts($_SESSION['referralCode']);

            $updated = ReferralTreeController::updateReferralTree($_SESSION['referralCode']);
            ReferralTreeController::debitAccounts($_SESSION['referralCode']);
            ReferralTreeController::updateTotalEarning();
            unset($_SESSION['referralCode']);
            $success .="Account created successfully";
            header('Location: views/signup_success.php?status=200');


        }
    } else {
        $status = "Password Did Not Match";
    }
} else {
    $error .= "All fields Required";
}