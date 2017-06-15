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

$error = $success = $usernameErr = $fullNameErr = $idNoErr
    = $passwordErr = $confirmPasswordErr = $phoneNumberErr
    = $emailErr = $matchErr = '';
$_SESSION['referralCode'] = ReferralTreeController::generateReferralCode();
$fullName = $idNo = $username = $phoneNumber = $email =
$password = $confirmPassword = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['username'])) {
        $usernameErr .= "Username  required";
    } else {
        $username = cleanInput($_POST['username']);
    }
    if (empty($_POST['fullName'])) {
        $fullNameErr = 'Full Name Required';
    } else {
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $_POST['fullName'])) {
            $nameErr = "Only letters and white space allowed";
        } else {
            $fullName = cleanInput($_POST['fullName']);
        }
    }
    if (empty($_POST['email'])) {
        $emailErr = "Email Required";
    } else {
        if (!filter_var(cleanInput($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email";
        } else {
            $email = cleanInput($_POST['email']);
        }
    }
    if (empty($_POST['idNo'])) {
        $idNoErr = 'Id Number Required';
    } else {
        if (!is_numeric(cleanInput($_POST['idNo']))) {
            $idNoErr = "Only Numeric Value Allowed";
        } else {
            $idNo = cleanInput($_POST['idNo']);
        }
    }
    if (empty($_POST['phoneNumber'])) {
        $phoneNumberErr = "Phone Number Required";
    } else {
        $phoneNumber = cleanInput($_POST['phoneNumber']);
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password Required";
    } else {
        $password = cleanInput($_POST['password']);
    }
    if (empty($_POST['confirmPassword'])) {
        $confirmPasswordErr = "Confirm Password Required";
    } else {
        $confirmPassword = cleanInput($_POST['confirmPassword']);
    }
    if ($confirmPassword != $password) {
        $matchErr = 'Password Did not Match';
        $error .= 'Error! Password Did not Match';
    }
    if ($usernameErr == '' && $fullNameErr == '' &&
        $idNoErr == '' && $passwordErr == '' &&
        $confirmPasswordErr == '' && $phoneNumberErr == '' &&
        $emailErr == '' && $matchErr == ''
    ) {

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setFullName($fullName);
        $user->setCreatedAt(date('Y-m-d H:i:s'));
        $user->setAccountStatus('active');
        $user->setEmail($email);
        $user->setIdNo($idNo);
        $user->setLastLogin(date('Y-m-d H:i:s'));
        $user->setLoginIp($_SERVER['REMOTE_ADDR']);
        $user->setPhoneNumber($phoneNumber);
        $user->setPaymentStatus('paid');
        $user->setUserReferralCode($_SESSION['referralCode']);
        $userCtrl = new UserController();
        $created = $userCtrl->create($user);
        if ($created) {
            $id = ReferralTreeController::getUserId($_SESSION['referralCode']);
            if (isset($_POST['referralCode'])) {
                $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode'], cleanInput($_POST['referralCode']));
            } elseif (!isset($_POST['referralCode'])) {
                $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode']);
            }
            ReferralTreeController::createReferralCodeEarning($id, $_SESSION['referralCode']);
            ReferralTreeController::createReferralCodeCounts($_SESSION['referralCode']);

            $updated = ReferralTreeController::updateReferralTree($_SESSION['referralCode']);
            ReferralTreeController::debitAccounts($_SESSION['referralCode']);
            ReferralTreeController::updateTotalEarning();
            unset($_SESSION['referralCode']);
            $success .= "Account created successfully";
            header('Refresh: 3; url=views/signup_success.php?status=200');
        } else {
            $error .= "Error Internal Server error occurred. Account not Created";
        }
    }
}

