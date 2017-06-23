<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/16/17
 * Time: 9:57 AM
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'config.php';
require_once 'php-excel.class.php';
use \App\Entity\Payment;
use \App\Controller\PaymentController;
use \App\Controller\FundController;

//
//$payment = new Payment();
//$payment = new Payment();
//$payment->setEmail("test@mail.com");
//$payment->setUserId(rand(1, 1000));
//$payment->setAmount((float)constant('AMOUNT'));
//$payment->setDatePaid(date('Y-m-d H:i:s'));
//$payment->setPhoneNumber("1234");
//$payment->setTransactionId(md5(uniqid("txnId", true)));
//
//
//$paymentCtrl = new PaymentController();
//if($paymentCtrl->create($payment) ===TRUE){
//    echo "i executed";
//}
//else{
//    print_r($paymentCtrl->create($payment));
//}

$data = FundController::showAllEarnings();
//print_r($array);



function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// file name for download
$fileName = "asili_payment" . date('Ymd') . ".xls";

// headers for download
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Content-Type: application/vnd.ms-excel");

$flag = false;
foreach ($data as $row) {
    if (!$flag) {
        // display column names as first row
        echo implode("\t", array_keys($row)) . "\n";
        $flag = true;
    }
    // filter data
    array_walk($row, 'filterData');
    echo implode("\t", array_values($row)) . "\n";

}

exit;
?>