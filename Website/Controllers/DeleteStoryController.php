<?php
    session_start();

    // Import Coonection file
    require_once('../database/Connection.php');

    // Define Connection
    $connection = new Connection();
    
    // Get story id
    $id = $_POST['id'];
 
    // Get image name TO DELETE it in folder StoriesImages
    $img = "SELECT story_image FROM stories WHERE id='$id' LIMIT 1;";

    // execute query aka get image
    $result = mysqli_query($connection->__construct(), $img) or die("Error" . $connection->__construct());

    // Loop through rows in db to get story iamge 
    while($row = mysqli_fetch_array($result)){
        // Check if that image exists on server 
        if (file_exists($row['story_image'])){
            // Delete Query
            $sql = "DELETE FROM stories WHERE id='" . $id . "';";

            // execute query aka delete data
            mysqli_query($connection->__construct(), $sql) or die($connection->__construct());

            // Delete image
            unlink($row['story_image']);
        }
    }

    // close connection
    $connection->__construct()->close();
?>