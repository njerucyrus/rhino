<?php
session_start();
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/18/17
 * Time: 4:30 PM
 */

require_once 'AfricasTalkingGateway.php';
require_once __DIR__ . '/../vendor/autoload.php';
require "config.php";

use \App\Entity\Payment;
use \App\Controller\PaymentController;
use \App\Controller\UserController;

$user = UserController::getUserByUsername($_SESSION['username']);

try {

    $metadata = array(
        "agentId" => "",
        "shopId" => ""
    );

    $phoneNumber = cleanInput($_POST['phoneNumber']);
    $gateway = new AfricasTalkingGateway(constant('API_USERNAME'), constant('API_KEY'), "sandbox");
    $transactionId = $gateway->initiateMobilePaymentCheckout(
        constant('MOBILE_PRODUCT'),
        $phoneNumber,
        constant('CURRENCY_CODE'),
        (float)constant('AMOUNT'),
        $metadata
    );
    $payment = new Payment();
    $payment->setEmail($user['email']);
    $payment->setUserId($user['id']);
    $payment->setAmount((float)constant('AMOUNT'));
    $payment->setDatePaid(date('Y-m-d H:i:s'));
    $payment->setTransactionId($transactionId);
    $paymentCtrl = new PaymentController();
    $paymentCtrl->create($payment);
} catch (AfricasTalkingGatewayException $e) {
    echo $e->getMessage();
}


function cleanInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

