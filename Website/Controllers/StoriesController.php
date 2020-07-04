<?php 
    // Import Coonection file
    require_once('../database/Connection.php');


    // Define Connection
    $connection = new Connection();
    
    $username = $_COOKIE['username'];

    // $_COOKIE['EditPid'] = null;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stories - All Stories</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/navbar.css">
        <!-- <link rel="shortcut icon" href="../img/logo.png"  type="image/x-icon"> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
    </head>
    <body>
        <!-- Navbar -->
        <nav class="tabs">
            <div class="tabs-container">
            <?php 
                echo "
                    <a class='tab' href='StoriesController.php?uid=" . $_COOKIE['userID'] .  "'>Home</a>
                    <a class='tab' href='StoriesController.php?uid=" .  $_COOKIE['userID'] . "'  >Stories</a>
                ";
            ?>
            <a class="tab" href="../views/AddStoryView.php">New Story</a>
            <a class="tab" href="../views/ProfileView.php"><img class="user-image" src="<?php echo $_COOKIE['user-image'] ?>" alt="Image"> <span class="username text-capitalize"><?php echo $_COOKIE['username'] ?></span></a>
            <a class="tab" href="LogoutController.php">Logout</a>
            <!-- <span class="et-hero-tab-slider"></span> -->
            </div>
        </nav>

        <div class="container ">
            <div class="row showStories">
                <!-- Reading stories From Dtabase -->

            </div>
        </div>
        

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script>
            $(document).ready(function(){
                let u = $("span.deleteButton").data("userid");
                function update(){
                    $.ajax({
                        url: "uid.php",
                        method: "GET",
                        success: function(id){
                            $.ajax({
                                url: "../Controllers/GetStoriesController.php?uid=" + id,
                                method: "GET",
                                success: function(data){
                                    $(".showStories").html(data);
                                    console.log("data");
                                }
                            });
                        }
                    });
                }

                setInterval(update, 1000);
            });
        </script>

        <script src="../js/add_story.js"></script>
 
    </body>
</html>