<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/16/17
 * Time: 1:55 PM
 */
require_once __DIR__.'/../../vendor/autoload.php';
$users = \App\Controller\UserController::all();
print_r($users);