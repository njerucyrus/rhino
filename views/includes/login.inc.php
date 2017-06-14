<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/14/17
 * Time: 11:18 PM
 */
use App\Auth\Auth;
$username = $password = $error= '';
if(isset($_SESSION['username'])){
    header("Location: views/home.php");
}

if(isset($_COOKIE['asili_username'])){
    header("Location: views/home.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = cleanInput($_POST['username']);
        $password = cleanInput($_POST['password']);
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
            $error = "Invalid username/password";
        }

    }
    function cleanInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}