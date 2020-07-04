<?php
    session_start();

    $id = $_POST['id'];
    $_SESSION['editStoryId'] = $id;
    
    echo $_SESSION['editStoryId'];