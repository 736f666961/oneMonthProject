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
        <title>Blog - Login or Signup</title>
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/login.css">
        <!-- <link rel="stylesheet" href="css/media.css"> -->
        <link rel="stylesheet" href="../libs/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <link rel="shortcut icon" href="img/logo.png"  type="image/x-icon">
    </head>
    <body>
        <!-- Start Navbar  -->
        <header class="header">
        <a href="../index.php" class="logo">
            <img src="../img/logo.png" height="50" width="50" alt="">
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

        <div class="container mt-4">
            <?php 
                if (!isset($_SESSION['signin_errors'])){
                    echo "";
                }else{
                    echo $_SESSION['signin_errors'];
                }
            ?>
            <div class="row" style="margin-top: 80px;">
                <div class="container mt-4 col-sm-12 col-md-6 col-lg-4">
                    <h2 class="login">Login</h2>
                    <form method="POST" action="../Controllers/SigninController.php" class="mt-4" id="signin">
                        <div class="form-group">
                            <label for="signin-email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter your email" value="<?php isset($_COOKIE['email']) ?  printf($_COOKIE['email']) :  "" ?>" required>
                            <span id="emailError" class="text-danger small">
                                <?php 
                                    if (isset($_SESSION['emailError'])){
                                        echo $_SESSION['emailError'];
                                    }else{
                                        echo '';
                                    }
                                ?>
                                <!-- Email does not exits -->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="signin-password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" value="<?php isset($_COOKIE['password']) ? printf($_COOKIE['password']) : "" ?>" required>
                            <span id="passwordError" class="text-danger small">
                                <?php 
                                    if (isset($_SESSION['passwordError'])){
                                        echo $_SESSION['passwordError'];
                                    }else{
                                        echo '';
                                    }
                                ?>
                            </span>
                        </div>
 
                        <button type="submit" class="btn w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- <script src="../js/validateSignin.js"></script> -->
    </body>
</html>