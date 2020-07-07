<?php
    // Resume Session
    session_start();

    // Import Coonection file
    require_once('../database/Connection.php');


    // Define Connection
    $connection = new Connection();

    $posts = "        
        SELECT * FROM users u, stories s 
        WHERE u.user_id = s.story_id 
        ORDER BY s.id DESC;";
    // $posts = "SELECT * FROM stories;";
    // $posts = "SELECT * FROM stories INNER JOIN users ON users.user_id != stories.story_id OR users.user_id = stories.story_id;"; //  ON users.user_id=stories.story_id
    $all_posts = mysqli_query($connection->__construct(), $posts);
    while ($row = mysqli_fetch_array($all_posts)) {
        // if ($row['user_id'] == $row['story_id']){
            // echo "content ";<img class='user-image' src='" .  $row['image'] . "' alt='Image'>
        // }else{
            echo "
                <div class='cd'>
                    <div class='container cd-header'>
                        <a class='profile-link' data-profileID='" . $row['user_id'] . "' href='../views/ProfileView.php'>
                            <img class='user-image' src='" .  $row['image'] . "' alt='Image'>
                            <span class='username fs text-capitalize' style='font-weight:600'>" . $row['username'] . "</span>
                        </a>
                    </div>
                    <div class='row cd-whole-body'>
                        <div class='col'>
                            <div class='container bg-image'>
                                <div class='cd-image' style='background-image:url(" . $row['story_image'] . ")'></div>
                            </div>
                        </div>
                        <div class='col cd-section2'>
                            <h3 class='cd-title mc'>" . $row['story_title']  . "</h3>
                            <div class='cd-body mc mf'>" . $row['story_body'] . "</div>
                            <a class='read-more-link' data-id='" . $row['id'] . "' href='../views/StoryDetailsView.php?s=" . $row['id'] . "'>
                                <button class='read-more read-more-link text-white bg' data-id='" . $row['id'] . "'>Read more</button>
                            </a>
                        </div>
                    </div>
                </div>
            ";  
    }

?>

<!-- <script src="../js/deleteStory.js"></script> -->
<script src="../js/profileView.js"></script>
