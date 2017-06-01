<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/1/17
 * Time: 10:41 AM
 */
require_once __DIR__.'/vendor/autoload.php';

//$code = \App\Controller\ReferralTreeController::generateReferralCode();
//echo $code;


function add($x, $y=2){
    return $x+$y;
}

echo add(20,10);