<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_homepage.css">
    <title>ProGaSS</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src=""></script>
</head>

<body>

<div  class = 'navbarBox'>
        <div class = 'navLeft';>
            <ul class="navBarUl">
                <li class="navBarList" style="font-weight:bold">
                    <img class ='nav_icon' src="images/icon-home.png" alt="home icon"/>
                    <a href="homepage.php"> Home</a>
                </li>
                <li class="navBarList">
                    <img class ='nav_icon' src="images/icon-group.png" alt="home icon"/>
                    <a href="groups.php">Groups</a>
                </li>
                <li class="navBarList"> 
                    <img class ='nav_icon' src="images/icon-leaderboard.png" alt="home icon"/>
                    <a href="leaderboard.php">Leaderboard</a>
                </li>
                <li class="navBarList">
                    <img class ='nav_icon' src="images/icon-about.png" alt="home icon"/>
                    <a href="about.php">About</a>
                </li>
            </ul>
        </div>
        <div class="navRight">
            <ul class="navBarUl">
                <li class="navBarList" style="float:right"> 
                    <img class ='nav_icon' src="images/icon-logout.png" alt="home icon"/>
                    <a class="active" href="login.php">Log out</a>
                </li>
                <li class="navBarList" style="float:right"> 
                    <img class ='nav_icon' src="images/icon-profile.png" alt="home icon"/>
                    <a class="active" href="profile.php">Profile</a>
                </li>
            </ul>
        </div>
    </div>



</body>

</html>