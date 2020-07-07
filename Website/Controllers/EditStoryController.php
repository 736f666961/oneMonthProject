<?php
    session_start();

    // Import Coonection file
    require_once('../database/Connection.php');

    // // Get data from user
    $storyTitle = $_POST["story-title"];
    $storyBody = $_POST["story-body"];
    $storyImage = isset($_SESSION['story-image']) ? $_SESSION['story-image'] : $_POST['img'];
    $id = $_POST['EditPid'];

    // // Check user data
    if ($storyTitle != "" && $storyBody != "" && $storyImage != ""){
        // Define Connection
        $connection = new Connection();
        
        // Make data safe from injection
        $safeTitle = mysqli_real_escape_string($connection->__construct(), $storyTitle); 
        $safeBody = mysqli_real_escape_string($connection->__construct(), $storyBody); 
        $safeImage = mysqli_real_escape_string($connection->__construct(), $storyImage); 

        // echo 'Email Address seems new !';
        $sql = "UPDATE stories SET story_title='$safeTitle', story_body='$safeBody', story_image='$safeImage' WHERE id='$id';";
        
        echo $sql . "\n";

        // Check connection
        if (!$connection->__construct()) {
            die("Connection failed: " . $connection->__construct());
        }

        // echo "Data updated !";

        // execute query aka insert data
        mysqli_query($connection->__construct(), $sql);
        
        // close connection
        $connection->__construct()->close();

        // Redirect to posts page
        header("Location: ../views/StoriesView.php?uid=" . $_SESSION['userID']);
        
    }else{
        echo "Data does not updated !";
    }
?>