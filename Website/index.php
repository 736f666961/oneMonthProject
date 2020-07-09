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

        <meta name="description" content="Share your best stories for free, Any kind of stories ...">
        <meta name="keywords" content="story, stories, share story, share stories, my story, share my story, share our story, share our stories"/>
        <meta name="robots" content="index,nofollow" />

        <!-- Open Graph Meta Tags -->
        <meta property="og:title" content="Stories" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="./img/logo.png" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:alt" content="Stories Website Logo" />
        <meta property="og:description" content="Share your best stories for free, Any kind of stories ... " />
        <meta name="og:keywords" content="story, stories, share story, share stories, my story, share my story, share our story, share our stories"/>
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