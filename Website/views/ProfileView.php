<?php
    // Import database
    require_once("../database/Connection.php");

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

    if(isset($_POST['profileID'])){
        $_SESSION['profileID'] = $_POST['profileID'];
        $profileID = $_SESSION['profileID'];
    }

    if(isset($_POST['alt-profile-img'])){
        $_SESSION['alt-profile-img'] = $_POST['alt-profile-img'];
    }

    // Open connection to database
    $connection = new Connection();
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
                <?php 
                    $profileID = $_SESSION['profileID'];
                    $sql = "SELECT * FROM users WHERE user_id=$profileID";
                    // echo $sql;
                    $profileInfo = mysqli_query($connection->__construct(), $sql);
                    while ($row = mysqli_fetch_array($profileInfo)){
                        // echo "user_id : " . $row['user_id'] . " == " . " session user_id: " . $_SESSION['user_id'];   
                        if ($row['user_id'] == $_SESSION['user_id']){
                            header("Location: MyProfile.php");
                        }else{
                            echo "
                                <h2 class='mc mf'>Profile</h2>
                                <div class='row' style='margin-top: -32px;'>
                                    <div class='avatar-upload'>
                                        <div class='avatar-preview'>
                                            <div id='uploaded_image' style='background-image: url(" . $row['image'] .");'>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end image -->
                                </div>
                                <div class='row'>
                                    <div class='col d-flex flex-direction-column justify-content-center'>
                                        <div class='form-group'>
                                            <label class='mc mf' for='firstname'>Firstname</label>
                                            <h4 class='mc mf pv'>" . $row['firstname'] . "</h4>
                                        </div>
                                    </div>
                                    <div class='col d-flex flex-direction-column justify-content-center'>
                                        <div class='form-group'>
                                            <label class='mc mf' for='lastname'>Lastname</label>
                                            <h4 class='mc mf pv'>" . $row['lastname'] . "</h4>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class='row'>
                                    <div class='col d-flex flex-direction-column justify-content-center'>
                                        <div class='form-group'>
                                            <label class='mc mf' for='username'>Username</label>
                                            <h4 class='mc mf pv'>" . $row['username']  . "</h4>
                                        </div>
                                    </div>

                                    <div class='col d-flex flex-direction-column justify-content-center'>
                                        <div class='form-group'>
                                            <label class='mc mf' for='phone'>Phone number</label>
                                            <h4 class='mc mf pv'>" . $row['phone'] . "</h4>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/uploadProfileImage.js"></script>
        <script src="../js/validationProfile.js"></script>
    </body>
</html>