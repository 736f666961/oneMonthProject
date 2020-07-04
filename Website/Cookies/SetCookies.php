<?php
    class Cookies{
        public function __construct($firstname, $lastname, $username, $email, $password, $phone){
            setcookie('firstname', $firstname, time() + 31536000, "/"); // 1 year | Firstname
            setcookie('lastname', $lastname, time() + 31536000, "/"); // 1 year | Lastname
            setcookie('username', $username, time() + 31536000, "/"); // 1 year | Username
            setcookie('email', $email, time() + 31536000, "/"); // 1 year   | Email
            setcookie('password', $password, time() + 31536000, "/"); // 1 year   | Password
            setcookie('phone-number', $phone, time() + 31536000, "/"); // 1 year  | phone-number
        }
    }
?>