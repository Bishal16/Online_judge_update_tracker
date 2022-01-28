<!DOCTYPE html>
<html lang="en">
<html>
    
<head>
    
    <title>Programming Assistant</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="icon" href="images/icon-main.png">
</head>

<body>
    <div id="header">
        <h3>Programming Assistant</h3>
        <!-- <div class="ppp">   <?php echo $_SESSION["user_name"] ; ?></div> -->
        

    </div>

    <div class="panel">
        <h1>Login</h1>
        <form action="login1.php" method="post">
            <div id=box> <input type="text" name="userName" placeholder="User name.." value='Coder16'></div>
            <div id=box> <input type="password" name="password" placeholder="Password.." value='1111'></div>
            <div id=btn> <input id=btn type="submit" value="LOGIN"></div>
            <span><a href="signup.php">Don't have an account?Sign up</a> </span>
        </form>

    </div>

</body>

</html>

