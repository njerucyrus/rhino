<?php
session_start();
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 12/05/2017
 * Time: 11:30
 */

unset($_SESSION[sha1('username')]);
unset($_COOKIE[md5('asili_username')]);
$cookie_name = md5('asili_username');
//expire the cookie
setcookie($cookie_name, '', time() - (86400 * 30), "/");
session_destroy();
header('Location: ../index.php');