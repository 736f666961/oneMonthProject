<?php
    // Check if user has logged in and has enabled the cookies
    require_once("../Controllers/CheckLoginController.php");
    
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

    // Import Coonection file
    require_once('../database/Connection.php');

    // Define Connection
    $connection = new Connection();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stories - Story Destails</title>
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/storyDetails.css">
        <link rel="stylesheet" href="../libs/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        <style>
           #story-details{
            height: 330px;
            width: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
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

        <!-- Show story details -->
        <?php 
            $id = $_SESSION['id'];
            // Get id of story
            $getId = "SELECT * FROM stories WHERE id='$id';";
            // echo $getId;
            // echo $_SESSION['user-image'];
            $executeGetId = mysqli_query($connection->__construct(), $getId);
            while ($row = mysqli_fetch_array($executeGetId)){
                echo "
                    <div class='container'>
                        <div class='storyDetails'>
                            <div class='storyImage' style=background-image:url(" . $row['story_image'] . ")></div>
                            <h1 class='mc text-center storyDetailsTitle'>" . $row['story_title']  . "</h1>
                            <div class='storyDetailsBody'>
                                <p class='mc fc'>" . $row['story_body'] . "</p>
                            </div>

                            <div class='container'>
                                <div class='row com-row'>
                                    <div class='comments'>
                                        <img class='user-image' src='" . $_SESSION['user-image'] . "' alt='image'>
                                        <input  data-id='" . $row['id'] . "'  class='comment-body' type='text' name='comment-body' id='comment-body' placeholder='Add comment' required>
                                    </div>  
                                    <span class='container ml-4 small comment-body-error'></span>
                                </div>
                            </div>

                            <div class='container allComments'></div>
                            <div style='width: 100%;height:32px'></div>

                        </div>
                    </div>
                ";
            }
        ?>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/showComments.js"></script>
    </body>
</html>