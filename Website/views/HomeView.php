<!-- Start Navbar  -->
<header class="header">
    <a href="index.php" class="logo">
        <img src="./img/logo.png" height="88" width="113" alt="logo">
    </a>
    <input class="menu-btn" type="checkbox" id="menu-btn" />
    <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="./views/SignupView.php">Signup</a></li>
        <li><a href="./views/SigninView.php">Signin</a></li>
    </ul>
</header>
<!-- End Navbar  -->

<!-- Space -->
<div class="space"></div>
<!-- Main Title -->
<div class="container">
    <?php
        @session_start();
        if (isset($_SESSION['cookiesError'])){
            echo $_SESSION['cookiesError'];
        }
    ?>
    <div class="d-flex justify-content-center fs mf mc mt-10 title">Share Your Story</div>
</div>

<!-- Categories Cards -->
<div class="container">
    <div class="card-deck">
        <div class="row">
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="img/homeImages/adventures.jpg" alt="adventures">
                <div class="card-body">
                    <h4 class="card-title">Adventures Stories</h4>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="img/homeImages/friends.jpg" alt="friends">
                <div class="card-body">
                    <h4 class="card-title">Friends Stories</h4>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none"></div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="img/homeImages/women.jpg" alt="womans">
                <div class="card-body">
                    <h4 class="card-title">Womans Stories</h4>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
        </div>
        <!-- End row 1 -->
        
        <!-- Row 2 -->
        <div class="row">
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="img/homeImages/kids.jpg" alt="kids">
                <div class="card-body">
                    <h4 class="card-title">Kids Stories</h4>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="img/homeImages/teams.jpg" alt="teams">
                <div class="card-body">
                    <h4 class="card-title">Teams Stories</h4>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <div class="w-100 d-none d-sm-block d-md-none"></div>
            <div class="card mb-4">
                <img class="card-img-top img-fluid" src="img/homeImages/teachers.jpg" alt="teachers">
                <div class="card-body">
                    <h4 class="card-title">Teachers Stories</h4>
                    <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                </div>
            </div>
            <!-- <div class="w-100 d-none d-md-block d-lg-none">wrap every 3 on md</div> -->
        </div>
        <!-- End row 2 -->
    </div>
</div>
<!-- Cards end -->