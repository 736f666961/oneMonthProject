<?php
    // Check if user has logged in and has enabled the cookies
    require_once("../Controllers/CheckLoginController.php");
    
    // Import database
    require_once("../database/Connection.php");

    $connection = new Connection();

    // Check if user has logged in and has enabled the cookies
    require_once("../Controllers/CheckLoginController.php");
    @session_start();

    // Create checkLogin object 
    $checkLogin = new CheckLogin();

    if ($checkLogin->isCookiesEnabled() && $checkLogin->hasUserLoggedIn()){
        // Do not do anything
    }else{
        // Redirect to home page
        header('Location: ../.'); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stories - profile</title>
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/signup.css">
        <link rel="stylesheet" href="../libs/bootstrap.min.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        <style>
            .btn:focus{
                box-shadow: none !important;
            }
        </style>
    </head>
    <body>
        <!-- Start Navbar  -->
        <header class="header">
            <a href="StoriesView.php" class="logo">
                <img src="../img/logo.png" height="50" width="50" alt="">
            </a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="menu">
                <!-- <li><a href="">Home</a></li>
                <li><a href="">My stories</a></li> -->
                <?php 
                    echo "
                        <li><a class='tab' href='StoriesView.php'>Home</a></li>
                        <li><a class='tab' href='MyStoriesView.php'>My stories</a></li>
                    ";
                ?>
                <li><a href="AddStoryView.php">New Story</a></li>
                <li><a href="MyProfile.php">
                    <?php
                        $safeImage = isset($_SESSION['user-image']) ? $_SESSION['user-image'] : "../img/default/avatar.jpg";
                    ?>
                    <img class="user-image" src="<?php echo $safeImage ?>" alt="Image">
                    <span class="username text-capitalize"><?php echo $_SESSION['username'] ?></span>
                </a></li>
                <li><a href="../Controllers/LogoutController.php">Logout</a></li>
            </ul>
        </header>
        <!-- End Navbar  -->


        <div class="container mt-4">
   
            <div class="row">
                <div class="container col-md-8">
                    <form method='POST' action='../Controllers/UpdateProfile.php' class='mt-4' id='editProfile'>
                        <!-- <h2 class='mc mf'>My Profile</h2> -->
                        <div class='row' style='margin-top: -32px;'>
                            <div class='avatar-upload'>
                                <div class='avatar-edit'>
                                    <input type='file' accept='image/*' name='fileToUpload' id='fileToUpload'>
                                    <label for='fileToUpload'></label>
                                </div>
                                <div class='avatar-preview'>
                                    <?php 
                                        $background = isset($_SESSION['user-image']) ? $_SESSION['user-image'] : '../img/default/avatar.jpg';
                                    ?>
                                    <div id='uploaded_image' style='background-image: url(<?php echo $background ?>);'>
                                    </div>
                                    <!-- Check Error Image -->
                                    <span class='small text-danger text-center' id='imageError'></span>
                                </div>
                            </div>
                            <!-- end image -->
                        </div>
                        <div class='row'>
                            <div class='col'>
                                <div class='form-group'>
                                    <label class='mc mf' for='firstname'>Firstname</label>
                                    <input type='text' style="font-size: 16px !important;font-weight: 200 !important;" class='form-control text-capitalize' name='firstname' id='firstname' placeholder='Enter your firstname' autocomplete='off' value="<?php echo $_SESSION['firstname'] ?>" required>
                                    
                                    <!-- Firstname Error  -->
                                    <span id='firstnameError' class='text-danger small'></span>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='form-group'>
                                    <label class='mc mf' for='lastname'>Lastname</label>
                                    <input type='text' style="font-size: 16px !important;font-weight: 200 !important;" class='form-control text-capitalize' name='lastname' id='lastname' placeholder='Enter your lastname' autocomplete='off' value="<?php echo $_SESSION['lastname'] ?>" required>
                                
                                    <!-- Lastname Error  -->
                                    <span id='lastnameError' class='text-danger small'></span>
                                </div>
                            </div>
                        </div>
                
                        <div class='row'>
                            <div class='col'>
                                <div class='form-group'>
                                    <label class='mc mf' for='username'>Username</label>
                                    <input type='text' style="font-size: 16px !important;font-weight: 200 !important;" class='form-control text-capitalize' name='username' id='username' placeholder='Enter a username' autocomplete='off' value="<?php echo $_SESSION['username'] ?>" required>
                                    
                                    <!-- Username Error  -->
                                    <span id='usernameError' class='text-danger small'></span>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='form-group'>
                                    <label class='mc mf' for='email'>Email address</label>
                                    <input type='email' style="font-size: 16px !important;font-weight: 200 !important;" class='form-control text-capitalize' name='email' id='email' placeholder='Enter your email' autocomplete='off' value="<?php echo $_SESSION['email'] ?>" required>
                        
                                    <!-- Email Error  -->
                                    <span id='emailError' class='text-danger small'></span>                           
                                </div>
                            </div>
                        </div>
                
                        <div class='row'>
                            <div class='col'>
                                <div class='form-group'>
                                    <label class='mc mf' for='password'>Password</label>
                                    <input type='password' style="font-size: 16px !important;font-weight: 200 !important;" class='form-control text-capitalize' name='password' id='password' placeholder='Password' autocomplete='off' value="<?php echo $_SESSION['password'] ?>" required>
                                
                                    <!-- Password Error  -->
                                    <span id='passwordError' class='text-danger small'></span>
                                </div>
                            </div>
                            <div class='col'>
                                <div class='form-group'>
                                    <label class='mc mf' for='phone'>Phone number</label>
                                    <input type='text' style="font-size: 16px !important;font-weight: 200 !important;" class='form-control' autocomplete='off' name='phone' id='phone' placeholder='Enter your phone number' value="<?php echo $_SESSION['phone-number'] ?>" required>
                                
                                    <!-- Phonenumber Error  -->
                                    <span id='phoneNumberError' class='text-danger small'></span>
                                </div>
                            </div>
                        </div>
                
                        <button type='submit' class='btn bg text-white w-100 mc mf'>Save</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/uploadProfileImage.js"></script>
        <script src="../js/validationProfile.js"></script>
    </body>
</html>