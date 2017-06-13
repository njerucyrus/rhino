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
if (!isset($_SESSION['referralCode'])) {
    $_SESSION['referralCode'] = ReferralTreeController::generateReferralCode();
}

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
            // with the referralCode
            if (isset($_POST['referralCode']) && !empty($_POST['referralCode'])) {
                //use the option for a referralCode and debit the code.
                $id = ReferralTreeController::getUserId($_SESSION['referralCode']);
                $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode'], $_POST['referralCode']);
                ReferralTreeController::updateReferralTree($_POST['referralCode']);
                ReferralTreeController::debitAccounts($_POST['referralCode']);
                ReferralTreeController::updateTotalEarning();
                unset($_SESSION['referralCode']);
                $success .= 'Account Created Successfully';
                $_SESSION['username'] = $_POST['username'];
                //login the user
                //header('Location: home.php');

            }
            // without the referralCode
            elseif (!isset($_POST['referralCode'])) {
                $id = ReferralTreeController::getUserId($_SESSION['referralCode']);
                $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode']);
                ReferralTreeController::createReferralCodeEarning($id, $_SESSION['referralCode']);
                ReferralTreeController::createReferralCodeCounts($_SESSION['referralCode']);
                unset($_SESSION['referralCode']);
                $success .= 'Account Created Successfully';
                $_SESSION['username'] = $_POST['username'];
                //login the user
                header('Location: views/home.php');
            }
        }
    } else {
        $error .= "Password Did Not Match";
    }
} else {
    $error .= "All fields Required";
}