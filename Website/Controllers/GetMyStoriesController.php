<?php
    // Resume Session
    session_start();

    // Import Coonection file
    require_once('../database/Connection.php');


    // Define Connection
    $connection = new Connection();

    $uid = $_SESSION['user_id'];

    $story = "SELECT * FROM stories WHERE story_id = $uid ORDER BY id DESC;";
    // echo $story;
    // $posts = "SELECT * FROM stories;";
    // $posts = "SELECT * FROM stories INNER JOIN users ON users.user_id != stories.story_id OR users.user_id = stories.story_id;"; //  ON users.user_id=stories.story_id
    $all_stories = mysqli_query($connection->__construct(), $story);
    while ($row = mysqli_fetch_array($all_stories)) {
        // if ($row['user_id'] == $row['story_id']){
            // echo "content ";
        // }else{
            echo "
                <div class='cd'>
                    <div class='container cd-header'>
                        <a href='#'>
                            <img class='user-image' src='" .  $_SESSION['user-image'] . "' alt='Image'>
                            <span class='username fs text-capitalize'>" . $_SESSION['username'] . "</span>
                        </a>
                        <a href='#'>
                            <i data-deleteid='" . $row['id'] . "' class='fas fa-trash delete-icon'></i>
                        </a>
                        <a href='#'>
                            <i data-editid='" . $row['id'] . "' class='fas fa-pen edit-icon'></i>
                        </a>
                    </div>
                    <div class='row cd-whole-body'>
                        <div class='col'>
                            <div class='container'>
                                <img class='cd-image' src='" . $row['story_image'] . "' alt='image'>
                            </div>
                        </div>
                        <div class='col cd-section2'>
                            <h3 class='cd-title mc'>" . $row['story_title']  . "</h3>
                            <div class='cd-body mc mf'>" . $row['story_body'] . "</div>
                            <a class='read-more-link' data-id='" . $row['id'] . "' href='../views/StoryDetailsView.php'><button class='read-more text-white bg'>Read more</button></a>
                        </div>
                    </div>
                </div>
            ";  
    }

?>

<script src="../js/deleteStory.js"></script>
<script src="../js/editStory.js"></script>
<script src="../js/storyDetails.js"></script>

