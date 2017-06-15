<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/14/17
 * Time: 11:18 PM
 */
use App\Auth\Auth;
$username = $password = $loginError= '';
if(isset($_SESSION['username'])){
    header("Location: views/home.php");
}

if(isset($_COOKIE['asili_username'])){
    header("Location: views/home.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
        $username = cleanInput($_POST['loginUsername']);
        $password = cleanInput($_POST['loginPassword']);
        if(isset($_POST['keepLoggedIn'])){
            //login and set cookie
            $cookie_name = 'asili_username';
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        }
        $auth = Auth::authenticate($username, $password);
        if($auth){
            $_SESSION['username'] = $username;
            header("Location : views/home.php");
        }else{
            $loginError .= "Invalid username/password";
        }

    }
}