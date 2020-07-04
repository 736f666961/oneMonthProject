<?php
    session_start();

    // Import Coonection file
    require_once('../database/Connection.php');

    // Define Connection
    $connection = new Connection();

    // Story id
    $storyId = $_POST['story_id'];
    $uid = $_SESSION['user_id'];

    // Comments
    $comments = "SELECT * FROM comments;";
 
    $getComments = mysqli_query($connection->__construct(), $comments);
    while ($row = mysqli_fetch_array($getComments)){
    //   echo "Comment_Id : " . $row['comment_id'] . "<br>";
    //   echo "STory-id : " . $storyId . "<br>";
      if ($row['comment_id'] == $storyId){
          echo "
            <div class='row'>
                <div class='cb'>
                    <div class='container'>
                        <img class='user-image' src='" . $row['comment_owner_image'] . "' alt='image'>
                        <h3 class='mc comment-writer' style='margin-left:4px'>" . $row['comment_writter'] . "</h3>
                    </div>
                    <p class='show-comment'>" . $row['comment_body'] . "</p>
                </div>  
            </div>   
        ";
      }
    }
?>


