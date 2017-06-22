<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/18/17
 * Time: 4:30 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
use \App\Controller\PaymentController;
use \App\Controller\ReferralTreeController;
use \App\Controller\UserController;

$data = json_decode(file_get_contents('php://input'), true);


if(strtolower($data['status']) == 'success'){
    $id = $data['requestMetaData']['userId'];
    $completed = PaymentController::completeTxn($data['transactionId']);
    if (!is_null($data['requestMetaData']['referralCodePosted'])) {
        $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode'], $data['requestMetaData']['referralCodePosted']);
    } elseif (is_null($data['requestMetaData']['referralCodePosted'])) {
        $refTree = ReferralTreeController::createReferralTree($id, $data['requestMetaData']['userReferralCode']);
    }
    ReferralTreeController::createReferralCodeEarning($id, $data['requestMetaData']['userReferralCode']);
    ReferralTreeController::createReferralCodeCounts($data['requestMetaData']['userReferralCode']);

    $updated = ReferralTreeController::updateReferralTree($data['requestMetaData']['userReferralCode']);
    ReferralTreeController::debitAccounts($data['requestMetaData']['userReferralCode']);
    ReferralTreeController::updateTotalEarning();
    unset($_SESSION['referralCode']);


    if($completed){
        print_r(json_encode(array(
            "statusCode"=>200
        )));
        header('Location: signup_success.php?status=200');
        echo "<script> window.location.href='signup_success.php?status=200'</script>";
    }else{
        print_r(json_decode(array(
            "statusCode"=>500,
            "message"=>"Error occurred while processing your request, Please wait for 5 minutes before
            making payment again."
        )));
        header('Location: signup_success.php?status=500');
    }
}elseif (strtolower($data['status']) == 'failed'){
    $id = $data['requestMetaData']['userId'];
     $deleted = UserController::delete($id);
     if($deleted){
         print_r(json_encode(array(
             "statusCode"=>500,
             "message"=>"Transaction failed.{$data['description']}"
         )));
     }

    header('Location: signup_success.php?status=500');
}