<?php
    session_start();

    class CheckLogin{
        // check if user is enable cookies
        public function isCookiesEnabled(){
            if(count($_COOKIE) > 0) {
                // echo "Cookies are enabled <br>";
                return true;
            } else {
                // echo "Cookies are not enabled <br>";
                // Error html Structure 
                $enableCookiesError = "<div class='cookies-error'>Please enable cookies !</div>";

                // Set error in session
                $_SESSION['cookiesError'] = $enableCookiesError;
        
                return false;
            }
        }

        // check if user has logged to account before
        public function hasUserLoggedIn(){
            // Check if user had
            if (isset($_COOKIE['firstname']) && isset($_COOKIE['lastname']) && isset($_COOKIE['username']) && isset($_COOKIE['email']) &&
              isset($_COOKIE['password']) && isset($_COOKIE['user-image']) && isset($_COOKIE['phone-number']) && isset($_COOKIE['user_id']) &&
              $this->isSessionsSet()){
                // echo "User logged in before <br>";
                return true;
            }else{
                // echo "User did not logged in before <br>";
                return false;
            }
        }

        // check if user has logged to account before aka sessions has set
        public function isSessionsSet(){
            // Check if user had
            if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['username']) && isset($_SESSION['email']) &&
              isset($_SESSION['password']) && isset($_SESSION['user-image']) && isset($_SESSION['phone-number']) && isset($_SESSION['user_id'])){
                // echo "User logged in before <br>";
                return true;
            }else{
                // echo "User did not logged in before <br>";
                return false;
            }
        }
    }