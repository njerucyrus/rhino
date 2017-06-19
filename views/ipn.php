<?php
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
        $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode'], cleanInput($_POST['referralCode']));
    } elseif (is_null($data['requestMetaData']['referralCodePosted'])) {
        $refTree = ReferralTreeController::createReferralTree($id, $_SESSION['referralCode']);
    }
    ReferralTreeController::createReferralCodeEarning($id, $_SESSION['referralCode']);
    ReferralTreeController::createReferralCodeCounts($_SESSION['referralCode']);

    $updated = ReferralTreeController::updateReferralTree($_SESSION['referralCode']);
    ReferralTreeController::debitAccounts($_SESSION['referralCode']);
    ReferralTreeController::updateTotalEarning();
    unset($_SESSION['referralCode']);


    if($completed){
        print_r(json_encode(array(
            "statusCode"=>200,
            "message"=>"Your transaction was completed successfully."
        )));
    }else{
        print_r(json_decode(array(
            "statusCode"=>500,
            "message"=>"Error occurred while processing your request, Please wait for 5 minutes before
            making payment again."
        )));
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

}