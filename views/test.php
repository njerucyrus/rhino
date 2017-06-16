<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/16/17
 * Time: 9:57 AM
 */

require_once __DIR__.'/../vendor/autoload.php';

use App\Auth\Auth;

$auth = Auth::authenticate('njeru5', '123');
print_r($auth['accountStatus']);