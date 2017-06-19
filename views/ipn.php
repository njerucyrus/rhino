<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/18/17
 * Time: 4:30 PM
 */
require_once __DIR__.'/../vendor/autoload.php';
use \App\Controller\PaymentController;

$data = json_decode(file_get_contents('php://input'), true);




if(strtolower($data['status']) == 'success'){
    $completed = PaymentController::completeTxn($data['transactionId']);
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
}