<?php
    session_start();

    // Import connection file
    require_once('../database/Connection.php');



    // Define connection 
    $connection = new Connection();
    
    // Get data from user
    $commentBody = mysqli_real_escape_string($connection->__construct(), $_POST["comment_body"]);
    $commentID = $_POST['commentID'];
    $image = $_SESSION['user-image'];
    $comment_user_id = $_SESSION['user_id'];
    $commentWritter = $_SESSION['username'];

    $sql = "INSERT INTO comments (comment_body, comment_id, comment_owner_image, comment_writter, comment_user_id) 
    VALUES ('$commentBody', '$commentID', '$image', '$commentWritter', '$comment_user_id');";
            
    echo $sql . "<br>";
    // echo "Location: story_details?detailId=" . $_SESSION['detailId'];


    // execute query aka insert data
    mysqli_query($connection->__construct(), $sql) or die("Error " . mysqli_error($connection->__construct()));;

    // close connection
    $connection->__construct()->close();
    // echo "done";
    // Redirect to 
    // header("Location: story_details.php?detailId=" . $_SESSION['detailId']);
    
?>

