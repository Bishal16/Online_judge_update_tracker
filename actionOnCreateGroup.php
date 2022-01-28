<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesLb.css">
    <link rel="icon" href="images/icon-main.png">
    <title>Programming Assistant</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src=""></script>
</head>

<body>
    <ul class="navBarUl">
        <li class="navBarList"><a href="Home.html">Home</a></li>
        <li class="navBarList" style="font-weight:bold"><a href="Groups.html">Groups</a></li>
        <li class="navBarList"><a href="Leaderboard.html">Leaderboard</a></li>
        <li class="navBarList"><a href="About.html">About</a></li>
        <li class="navBarList" style="float:right"> <a href="Profile.html">Profile</a></li>
    </ul>


    <div class="center">
        <a href="Groups.php">Your Group has been created</a>

    </div>

</body>

</html>



<?php

$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "programming_assistant";
$connection = mysqli_connect($server, $user, $password, $database);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $groupName=$_POST["groupName"];
    $userName=$_POST["userName"];
    $admin = 'Yes';
    echo $userName;
 
        $sql= "Insert into groupInfo (groupName, memberHandle, adminStatus) values('$groupName','$userName', '$admin')";
        $iquery = mysqli_query($connection,$sql);
        
        if($iquery)
        {
            echo 'successful'.'<br>';
        }
        else
        {
            echo 'failed to insert data'.'<br>';
        }    
    
}

mysqli_close($connection);

?>
<script>
    window.location.href = "groups.php";
</script>