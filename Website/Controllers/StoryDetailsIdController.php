<?php
    // This page is used to set session id and read that id from StorydetailsView page via ajax
    session_start();
    $id = $_POST['id'];
    $_SESSION['id'] = $id;

    // echo $id;