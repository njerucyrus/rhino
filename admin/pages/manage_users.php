<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/15/17
 * Time: 3:09 PM
 */
require_once __DIR__.'/../../vendor/autoload.php';
use \App\Controller\UserController;

$data = json_decode(file_get_contents('php://input'), true);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 if(!empty($data)){
     $option = $data['option'];
     switch ($option){
         case 'approve':
             approveAccount();
             break;
         case 'block':
             blockAccount();
             break;
         case 'unblock':
             unblockAccount();
             break;
     }
 }
}

function approveAccount(){
    global $data;
    $approved  = UserController::approveAccount($data['userId']);
    if($approved === TRUE){
        print_r(json_encode(array(
            "statusCode"=>200,
            "message"=>"Account Approved successfully"
        )));
    }else{
        print_r(json_encode(array(
            "statusCode"=>500,
            "message"=>"Internal Server Error Occurred please try again latter"
        )));
    }
}
function blockAccount(){
    global $data;
    $blocked  = UserController::blockAccount($data['userId']);
    if($blocked === TRUE){
        print_r(json_encode(array(
            "statusCode"=>200,
            "message"=>"Account Blocked "
        )));
    }else{
        print_r(json_encode(array(
            "statusCode"=>500,
            "message"=>"Internal Server Error Occurred please try again latter"
        )));
    }
}
function unblockAccount(){
    global $data;
    $unblocked  = UserController::unblockAccount($data['userId']);
    if($unblocked === TRUE){
        print_r(json_encode(array(
            "statusCode"=>200,
            "message"=>"Account Unblocked "
        )));
    }else{
        print_r(json_encode(array(
            "statusCode"=>500,
            "message"=>"Internal Server Error Occurred please try again latter"
        )));
    }
}