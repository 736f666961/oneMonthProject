<?php
    // Check if user has logged in and has enabled the cookies
    // require_once("../Controllers/CheckLoginController.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stories - Signup</title>
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/signup.css">
        <link rel="stylesheet" href="../libs/bootstrap.min.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        
    </head>
    <body>
        <!-- Start Navbar  -->
        <header class="header">
            <a href="../index.php" class="logo">
                <img src="../img/logo.png" height="50" width="50" alt="logo">
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="menu">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./SignupView.php">Signup</a></li>
                <li><a href="./SigninView.php">Signin</a></li>
                <!-- <li><a href="#">About</a></li>
                <li><a href="#contact">Contact</a></li> -->
            </ul>
        </header>
        <!-- End Navbar  -->

        <div class="container">
            <div class="row">
                <div class="container col-md-8">
                    <h2 class="mc mf text-center">Signup</h2>
                    <form method="POST" action="../Controllers/SignupController.php" class="mt-4" id="signup">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mc mf" for="firstname">Firstname</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your firstname" autocomplete="off" required>
                                    <span class='small mc' id="firstnameError"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mc mf" for="lastname">Lastname</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your lastname" autocomplete="off" required>
                                    <span class='small mc' id="lastnameError"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mc mf" for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter a username" autocomplete="off" required>
                                    <span class='small mc' id="usernameError"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mc mf" for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" autocomplete="off" required>
                                    <span class='small mc' id="emailError"></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="mc mf" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required>
                                    <span class='small mc' id="passwordError"></span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="mc mf" for="phone">Phone number</label>
                                    <input type="text" class="form-control" autocomplete="off" name="phone" id="phone" placeholder="Enter your phone number" required>
                                    <span class='small mc' id="phoneError"></span>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn bg text-white w-100 mc mf">Signup</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="../js/validateSignup.js"></script>
    </body>
</html>