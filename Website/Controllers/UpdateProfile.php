<?php
    session_start();

    // Import connection file
    require_once('../database/Connection.php');

    require_once('../Cookies/SetCookies.php');

    // Define connection 
    $connection = new Connection();
    
    // Make data safe from injection
    $safefirstname = mysqli_real_escape_string($connection->__construct(), $_POST['firstname']);
    $safeLastname = mysqli_real_escape_string($connection->__construct(), $_POST['lastname']);
    $safeUsername = mysqli_real_escape_string($connection->__construct(), $_POST['username']);
    $safeEmail = mysqli_real_escape_string($connection->__construct(), $_POST['email']);
    $safePassword = mysqli_real_escape_string($connection->__construct(), $_POST['password']);
    $safePhonenumber = mysqli_real_escape_string($connection->__construct(), $_POST['phone']);    
    $safeImage = isset($_SESSION['profile-image']) ? mysqli_real_escape_string($connection->__construct(), $_SESSION['profile-image']) : $_SESSION['alt-profile-img'];

    // Update Cookies
    new Cookies($safefirstname, $safeLastname, $safeUsername, $safeEmail, $safePassword, $safePhonenumber);
    setcookie('user-image', $safeImage, time() + 31536000, "/");

    // echo "SafeImage: " . $safeImage;

    // Update sessions
    $_SESSION['currentImage'] = $safeImage;
    $_SESSION['firstname'] = $safefirstname;
    $_SESSION['lastname'] = $safeLastname;
    $_SESSION['username'] = $safeUsername;
    $_SESSION['email'] = $safeEmail;
    $_SESSION['password'] = $safePassword;
    $_SESSION['user-image'] = $safeImage;
    $_SESSION['phone-number'] = $safePhonenumber;

    // Delete all files in user images except current image
    // $directory = "../uploads/usersImages/" . $_SESSION['user_id'];
    // $currentImage = basename($_SESSION['currentImage']);
    // $files = scandir($directory);

    // // Debugging
    // // echo "Directory: " . $directory . "<br>";
    // // echo "current Image: " . $currentImage . "<br>";

    // for ($i = 0; $i < count($files); $i++){
    //     if ($files[$i] != $currentImage && !(is_dir($files[$i]))){
    //         // echo "Delete this image : " . $directory . "/" . basename($files[$i]) . "!<br>";
    //         unlink($directory . "/" . basename($files[$i]));
    //     }
    // }

    $sql = "UPDATE users SET firstname='$safefirstname', lastname='$safeLastname', username='$safeUsername', phone='$safePhonenumber', image='$safeImage', email='$safeEmail', password='$safePassword';";
    // echo $sql . '\n';

    // execute query aka insert data
    if (mysqli_query($connection->__construct(), $sql)){
        // close connection
        $connection->__construct()->close();
    }else{
        echo "Profile did not updated !";
    }

    // Redirect to anther page
    header("Location: ../views/StoriesView.php");
?>

