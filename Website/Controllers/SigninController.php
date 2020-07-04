<?php
    session_start();
    
    $_SESSION['signin_errors'] = null;

    // Import Connection Class
    require_once('../database/Connection.php');

    // Import setterGetterData File
    require_once('SetterGetterDataController.php');

    // import class we need
    $setGetData = new setterGetterData();

    // Set data got from user
    $setGetData->setEmail($_POST["email"]);
    $setGetData->setPassword($_POST["password"]);

    // Define Connection
    $connection = new Connection();

    // Get email
    $email = $setGetData->getEmail();
    $pwd = $setGetData->getPassword();

    // Find email 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pwd';";

    // Execute command "Find Email"
    $user = mysqli_query($connection->__construct(), $sql);

    // Check at least there's one row AKA user exists
    if (mysqli_num_rows($user) > 0){
        while($row = mysqli_fetch_array($user)){
            // Check if data match
            if ($row['email'] == $setGetData->getEmail() && $row['password'] == $setGetData->getPassword()){
                // Set super global variables AkA cookies
                /* 1 - */ setcookie('user_id', $row['user_id'], time() + 31536000, '/'); // 1year | user-id 
                /* 2 - */ setcookie('username', $row['username'], time() + 31536000, "/"); // 1 year | Username
                /* 3 - */ setcookie('firstname', $row['firstname'], time() + 31536000, "/"); // 1 year | Firstname
                /* 4 - */ setcookie('lastname', $row['lastname'], time() + 31536000, "/"); // 1 year | Lastname
                /* 5 - */ setcookie('phone-number', $row['phone'], time() + 31536000, "/"); // 1 year  | phone-number
                /* 6 - */ setcookie('user-image', $row['image'], time() + 31536000, "/"); // 1 year  | user-image
                /* 7 - */ setcookie('email', $row['email'], time() + 31536000, "/"); // 1 year   | Email
                /* 8 - */ setcookie('password', $row['password'], time() + 31536000, "/"); // 1 year   | Password

                // Set sessions
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['user-image'] = $row['image'];
                $_SESSION['phone-number'] = $row['phone'];
                $_SESSION['user_id'] = $row['user_id'];
                
                // Debugging
                // echo "1 - " . $emailError . " your email : " . $setGetData->getEmail()  . "<br>";
                // echo "1 - " . $passwordError . " your password: " . $setGetData->getPassword() . "<br>";

                // Redirect to 
                header("Location: ../views/StoriesView.php");
            }
        }
    }else{
        // Set error when login data does not exists
        $emailError = "Incorrect Email";
        $passwordError = "incorrect Password";

        $_SESSION['emailError'] = $emailError;
        $_SESSION['passwordError'] = $passwordError;

        // Debugging
        // echo "4 - " . $emailError . " your email : " . $setGetData->getEmail()  . "<br>";
        // echo "4 - " . $passwordError . " your password: " . $setGetData->getPassword() . "<br>";

        // Redirect to home page
        header("Location: ../views/SigninView.php");
    }

    // close connection
    $connection->__construct()->close();

?>