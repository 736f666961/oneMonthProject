<?php 
    // Check if user has logged in and has enabled the cookies
    require_once("../Controllers/CheckLoginController.php");

    // Impot check Login class that located in ../Controllers/CheckLoginController.php
    $checkLogin = new CheckLogin();

    if ($checkLogin->isCookiesEnabled() && $checkLogin-> hasUserLoggedIn()){
        // Expire all cookies
        // setcookie('firstname', $_COOKIE['firstname'], time() - 31536000, "/"); // delete cookie Firstname
        // setcookie('lastname', $_COOKIE['lastname'], time() - 31536000, "/"); /// delete cookie | Lastname
        // setcookie('username', $_COOKIE['username'], time() - 31536000, "/"); // delete cookie | Username
        // setcookie('email', $_COOKIE['email'], time() - 31536000, "/"); // delete cookie | Email
        // setcookie('password', $_COOKIE['password'], time() - 31536000, "/"); // delete cookie  | Password
        // setcookie('phone-number', $_COOKIE['phone-number'], time() - 31536000, "/"); // delete cookie  | phone-number
        // setcookie('user_id', $_COOKIE['user_id'], time() - 31536000, "/"); // delete cookie | user_id
        // setcookie('user-image', $_COOKIE['user-image'], time() - 31536000, "/"); // delete cookie | user_image

        // Destroy All Sessions
        @session_start();
        session_unset();
        session_destroy();

        // Redirect to home page
        header("location: ../index.php");
    }else{
        // Redirect to home page
        header("location: ../index.php");
    }
?>