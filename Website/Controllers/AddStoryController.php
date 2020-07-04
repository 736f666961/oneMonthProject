<?php
    session_start();

    // Import connection file
    require_once('../database/Connection.php');



    // Define connection 
    $connection = new Connection();
    
    // Get data from user
    $storyTitle = $_POST["story-title"];
    $storyBody = $_POST["story-body"];

    // Make data safe from injection
    $safeTitle = mysqli_real_escape_string($connection->__construct(), $storyTitle);
    $safeBody = mysqli_real_escape_string($connection->__construct(), $storyBody);
    $safeImage = mysqli_real_escape_string($connection->__construct(), $_SESSION['story-image']);

    // Debugging
    // echo "safeTitle : " . $safeTitle . "\n";
    // echo "safeBody : " . $safeBody . "\n";
    // echo "safeImage : " . $safeImage . "\n";


    $uid = $_COOKIE['user_id'];
    $usr = $_COOKIE['username'];

    // Debugging
    // echo "uid with cookie: " . $uid . "\n";
    // echo "username with cookie: " . $usr . "\n";

    $sql = "INSERT INTO stories (story_id, story_title, story_body, story_image, written_by) 
    VALUES ('$uid','$safeTitle','$safeBody','$safeImage','$usr');";

    // Reading stories images from folders
    $directory = "../uploads/StoriesImages/" . $_SESSION['user_id'];
    $files = scandir($directory);
    
    // execute query aka insert data
    mysqli_query($connection->__construct(), $sql) or die("Error " . mysqli_error($connection->__construct()));

    // Reading stories images from database
    $imgs = "SELECT story_image FROM stories;";
    $dbImages = array();

    // Execute query on line 45
    $exeImgs = mysqli_query($connection->__construct(), $imgs);

    while($row = mysqli_fetch_array($exeImgs)){
        array_push($dbImages, basename($row['story_image']));
    }

    // print_r($dbImages);
    // print_r($files);
    // Loop through images in storiesImages folder
    foreach ($files as $file){
        if (!(is_dir($file)) && in_array($file, $dbImages)){
            // echo "Don't delete this image: " . $file . "\n";
            echo "";
        }else{
            unlink($directory . "/" . $file);
            // echo "Delete this image: " . $file . "\n";
        }
    }
    
    // close connection
    $connection->__construct()->close();

?>

