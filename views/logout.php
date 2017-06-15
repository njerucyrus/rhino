<?php
session_start();
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 12/05/2017
 * Time: 11:30
 */

unset($_SESSION['username']);
unset($_COOKIE['asili_username']);
session_destroy();
header('Location: index.php');