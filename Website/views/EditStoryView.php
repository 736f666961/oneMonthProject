<?php 
    // Check if user has logged in and has enabled the cookies
    require_once("../Controllers/CheckLoginController.php");

    // Import database class 
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

    // Open Connection
    $connection = new Connection();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stories - Create new story</title>
        <link rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="../css/signup.css">
        <link rel="stylesheet" href="../css/addStory.css">
        <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon">
        <link rel="stylesheet" href="../libs/bootstrap.min.css">
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


        <!-- Form for edit story -->
        <?php 
            // Get Id 
            $id = $_SESSION['editStoryId'];
            // echo "Id: " . $id . "<br>";

            // Get story
            $story = "SELECT * FROM stories WHERE id=$id;";
            // echo $story . "<br>";

            $storyInfo = mysqli_query($connection->__construct(), $story);
            while ($row = mysqli_fetch_array($storyInfo)) {
                // echo $row['story_image'];
                echo "
                <div class='container col-md-8'>
                    <input type='hidden' id='eid' value='" . $row['id'] . "'>
                    <div class='row'>
                        <div class='container col-md-8'>
                            <h1 class='mc mf'>Edit story</h1>
                            <h2 class='mc mf text-center' style='padding-bottom: 16px;'>Story image</h2>
                            <form method='POST' action='' class='mt-4' id='addStory'>
                                <div class='row' style='margin-top: -32px;'>
                                    <div class='avatar-upload'>
                                        <div class='avatar-edit'>
                                            <input type='file' accept='image/*' name='fileToUpload' id='fileToUpload'>
                                            <label for='fileToUpload'></label>
                                        </div>
                                        <div class='avatar-preview'>
                                            <div id='uploaded_image' style='background-image: url(" . $row['story_image'] . ");'>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end image -->
                                </div>
                                <div class='row'>
                                    <div class='col'>
                                        <div class='form-group'>
                                            <label class='mc mf' for='fullname'>Story title</label>
                                            <input type='text' class='form-control' name='story-title' id='story-title' placeholder='Enter title of story' value='" . $row['story_title'] . "'>
                                            
                                            <!-- Check Error title -->
                                            <span class='text-center' id='storyTitleError'></span>
                                        </div>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col'>
                                        <div class='form-group'>
                                            <label for='story-body mc mf'>Story body</label>
                                            <textarea class='form-control' placeholder='Enter story body' name='story-body' id='story-body' cols='30' rows='4'>" . $row['story_body'] . "</textarea>
                                            <!-- Check Error body -->
                                            <span class='text-center' id='storyBodyError'></span>
                                        </div>
                                    </div>
                                </div>
                                
                                <button type='submit' class='btn bg text-white w-100 mc mf'>Edit story</button>
                            </form>
                        </div>
                    </div>
                </div>
";
            }
        ?>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="../js/uploadStoriesimages.js"></script>
        <script src="../js/applyEditStory.js"></script>
    </body>
</html>