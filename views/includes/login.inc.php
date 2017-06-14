<?php
/**
 * Created by PhpStorm.
 * User: hudutech
 * Date: 6/14/17
 * Time: 11:18 PM
 */
$username = $password = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = cleanInput($_POST['username']);
        $password = cleanInput($_POST['password']);
        if(isset($_POST['keepLoggedIn'])){
            //login and set cookie
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