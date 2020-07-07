<?php
    session_start();
    
    // Import files
    require_once('../database/Connection.php');
    require_once('setterGetterDataController.php');
    require_once("ValidateSignupController.php");
    require_once('../Cookies/SetCookies.php');

    // import class we need
    $setGetData = new setterGetterData();

    // Import validation Class
    $validation = new SignupValidation();

    // Set data got from user
    $setGetData->setFirstname($_POST["firstname"]);
    $setGetData->setLastname($_POST["lastname"]);
    $setGetData->setUsername($_POST["username"]);
    $setGetData->setEmail($_POST["email"]);
    $setGetData->setPassword($_POST["password"]);
    $setGetData->setPhoneNumber($_POST['phone']);

    // Check user data
    if ($validation->validateAllFields($setGetData->getFirstname(), $setGetData->getLastname(), $setGetData->getUsername(),
        $setGetData->getEmail(), $setGetData->getPassword(), $setGetData->getPhoneNumber())){
        
        // Debugging
        // echo "If - Firstname validated with: " . $setGetData->getFirstname() . " <br>";
        // echo "If - Lastname validated with: " . $setGetData->getLastname() . " <br>";
        // echo "If - Username validated with: " . $setGetData->getUsername() . " <br>";
        // echo "If - Email validated with: " . $setGetData->getEmail() . " <br>";
        // echo "If - Password validated with: " . $setGetData->getPassword() . " <br>";
        // echo "If - Phone validated with: " . $setGetData->getPhoneNumber() ."<br>";

        // Define Connection
        $connection = new Connection();
        
        // Get data and make it safe from injection
        $safeUsername = mysqli_real_escape_string($connection->__construct(), $setGetData->getUsername());
        $safeEmail = mysqli_real_escape_string($connection->__construct(), $setGetData->getEmail());
        $safePassword = mysqli_real_escape_string($connection->__construct(), $setGetData->getPassword());
        $safeFirstname = mysqli_real_escape_string($connection->__construct(), $setGetData->getFirstname());
        $safeLastname = mysqli_real_escape_string($connection->__construct(), $setGetData->getLastname());
        $safePhoneNumber = mysqli_real_escape_string($connection->__construct(), $setGetData->getPhoneNumber());
        $safeImage = isset($_COOKIE['user-image']) ? mysqli_real_escape_string($connection->__construct(), $_COOKIE['user-image']) : "../img/default/avatar.jpg";

        // Check if email is not alreafy exists
        if ($connection->checkEmailExistence($safeEmail)){         
            // Email already exists error
            $error = "<div class='alert alert-danger' role='alert'>
                        <strong>Error!</strong> 
                        <a class='alert-link'>Email already exists</a> Try again.
                      </div>";
        
            $_SESSION['signup_error'] = $error;

            // Redirect to 
            header("Location: ../views/SignupView.php");
        }else{
            // echo 'Data inserted into database !';

            $sql = "INSERT INTO users (username, firstname, lastname, phone, image, email, password) VALUES 
                    ('$safeUsername', '$safeFirstname', '$safeLastname', '$safePhoneNumber', '$safeImage', '$safeEmail', '$safePassword')";

            // Set Cookies
            new Cookies($safeFirstname, $safeLastname, $safeUsername, $safeEmail, $safePassword, $safePhoneNumber);
            setcookie('user-image', $safeImage, time() + 31536000, "/"); // set cookie | user_image

            // Set sessions
            $_SESSION['firstname'] = $safeFirstname;
            $_SESSION['lastname'] = $safeLastname;
            $_SESSION['username'] = $safeUsername;
            $_SESSION['email'] = $safeEmail;
            $_SESSION['password'] = $safePassword;
            $_SESSION['user-image'] = $safeImage;
            $_SESSION['phone-number'] = $safePhoneNumber;

            // execute query aka insert data
            mysqli_query($connection->__construct(), $sql);

            // Find email and password
            $getData = "SELECT * FROM users WHERE email='$safeEmail' AND password='$safePassword' LIMIT 1;";

            // Execute command "Find Email"
            $user = mysqli_query($connection->__construct(), $getData);

            // Check at least there's one row AKA user exists
            if (mysqli_num_rows($user) > 0){
                // lop through emails and passwords
                while($row = mysqli_fetch_array($user)){
                    // check id data eists
                    if ($row['email'] == $safeEmail && $row['password'] == $safePassword){

                        // Set super global variables AkA cookie
                        setcookie('user_id', $row['user_id'], time() + 31536000, "/"); // 1 year  | user_id
                        $_SESSION['user_id'] = $row['user_id'];
                        // setcookie('logout', 'logout', time() , "/"); // Expire logout cookie 
                        
                        // redirect to todolist page
                        header("location: ../views/StoriesView.php");
                    }
                }
            }

            // Remove signup error
            if(isset($_SESSION['signup_error'])){
                $_SESSION['signup_error'] = null;
            }

            // close connection
            $connection->__construct()->close();
        }
    }else{
        // echo "Data does not match ! <br>";

        // Debugging
        // echo "Else - Firstname validated with: " . $setGetData->getFirstname() . " <br>";
        // echo "Else - Lastname validated with: " . $setGetData->getLastname() . " <br>";
        // echo "Else - Username validated with: " . $setGetData->getUsername() . " <br>";
        // echo "Else - Email validated with: " . $setGetData->getEmail() . " <br>";
        // echo "Else - Password validated with: " . $setGetData->getPassword() . " <br>";
        // echo "Else - Phone validated with: " . $setGetData->getPhoneNumber() ."<br>";
        
        // $error = "<div class='alert alert-danger' role='alert' style='margin-top:100px;'>
        //             <strong>Error!</strong> 
        //             <a class='alert-link'>Make sure you complete the required fields !</a> Try again.
        //           </div>";

        // $_SESSION['signup_errors'] = $error;

        // // Redirect to 
        header("Location: ../views/SignupView.php");
    }

?>