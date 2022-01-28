<?php
session_start();
?>


<?php

$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "programming_assistant";

$connection = mysqli_connect($server, $user, $password, $database);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $pass=$_POST["password"];
    $userName=$_POST["userName"];
        
        $sql= "SELECT * FROM userinfo WHERE userName = '$userName'";
        $query = mysqli_query($connection,$sql);
        $num_rows= mysqli_num_rows($query);
        
        if($query)
        {
            $dpass= mysqli_fetch_array($query,MYSQLI_NUM);
            

            if($dpass[1]==$pass)
            {
                $_SESSION["user_name"] = $userName;
                //echo $_SESSION["user_name"] ;
                
                header("Location:homepage.php");
            }
            else
            {
                if($num_rows==0)
                {
                $error = 1;              //not signed up
                $msg= 'You need to sign up first<br><br>'.'<a href="signup.php">Sign Up</a>';
                echo"
                <script type=\"text/javascript\">
                    alert('login failed','not signed up');
                </script>
                ";
                //header("Location:login.php");
                }
                else
                {
                    $error = 2;          //incorrect password;
                    $msg= 'Incorrect Password<br>';
                    echo"
                    <script type=\"text/javascript\">
                       alert(' incorrect password');
                    </script>
                    ";
                    //header("Location:login.php");
                   
                }
            }
        }
        else
        {
            echo 'could not fatch data from database'.'<br>';
        }   
}


mysqli_close($connection);

?>

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
            <div id=box> <input type="text" name="userName" placeholder="User name.."></div>
            <div id=box> <input type="password" name="password" placeholder="Password.."></div>
            <div id=btn> <input id=btn type="submit" value="LOGIN"></div>
            <span><a href="signup.php">Don't have an account?Sign up</a> </span>
        </form>

    </div>

</body>

</html>



