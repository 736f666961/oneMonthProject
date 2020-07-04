<?php 
    // Import Coonection file
    require_once('../database/Connection.php');

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

    // Define Connection
    $connection = new Connection();
    
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stories - All Stories</title>
        <link rel="stylesheet" href="../css/storiesView.css">
        <link rel="stylesheet" href="../css/storiesViewMedia.css">
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        <link rel="stylesheet" href="../libs/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

        <div class="container ">
            <div class="row showStories">
                <!-- Reading stories From Dtabase -->
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="../js/loadingMyStories.js"></script>
        <!-- <script src="../js/storyDetails.js"></script> -->
        <!-- <script src="../js/deleteStory.js"></script> -->
        <!-- <script src="../js/loading.js"></script>
        <script src="../js/add_story.js"></script> -->

    </body>
</html>

                        