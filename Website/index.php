<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Stories - Home</title>
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/indexMedia.css">
        <link rel="stylesheet" href="./libs/bootstrap.min.css">
        <link rel="shortcut icon" href="./img/logo.png"  type="image/x-icon">
    </head>
    <body>
        <?php 
            require_once("./Controllers/CheckLoginController.php");

            $checkLogin = new CheckLogin();

            if ($checkLogin->isCookiesEnabled() && $checkLogin->hasUserLoggedIn()){
                header('Location: ./views/StoriesView.php'); // Import home view that everyone can see
            }else{
                require_once('./views/HomeView.php'); // Import home view that everyone can see
            }
        ?>
    </body>
</html>