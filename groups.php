<?php
session_start();
?>



<?php
$userHandle = $_SESSION['user_name'];
//echo $userHandle;


$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "programming_assistant";

    $connection = mysqli_connect($server, $user, $password, $database); 
        if($connection){
            //echo"connection successful";
        }
        $sql= "SELECT * FROM groupInfo WHERE memberHandle = '$userHandle'";
        $query = mysqli_query($connection, $sql);

        if($query){
            //echo"query successful";
        }else{
            echo"query failed";
        }
        
        $num_rows= mysqli_num_rows($query);

        $groupName=array();
        $i=0;
        while($row = mysqli_fetch_assoc($query)) 
        {
            $groupName[$i] = $row["groupName"]; 
            $i++;
            
        }
        $i=0;
        
        if($num_rows==0)
        {           
            $msg = 'You are not member of any group';
        }else{
            $msg = '';
        }

mysqli_close($connection);

?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_groups.css">
    <link rel="icon" href="images/icon-main.png">
    <title>ProGaSS</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src=""></script>
</head>

<body>

    <div  class = 'navbarBox'>
        <div class = 'navLeft';>
            <ul class="navBarUl">
                <li class="navBarList" >
                    <img class ='nav_icon' src="images/icon-home.png" alt="home icon"/>
                    <a href="homepage.php"> Home</a>
                </li>
                <li class="navBarList" style="font-weight:bold">
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

   




    <div class="center">
        
        <button class="menu" style="float: right" onclick="openForm()">create</button>

        <div class="form-popup" id="createGroupForm">
            <form action="actionOnCreateGroup.php" class="groupForm" method="post">
                <h1>Create New Group</h1>
                <label for="groupName"><b>Group Name</b></label>
                <input type="text" placeholder="Enter Group Name (must be unique)" name="groupName" required>
                <input type="hidden" value="<?php echo $userHandle?>" name="userName">
                <button type="submit" class="btn">Create Group</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>

        <script>
            function openForm() {
                document.getElementById("createGroupForm").style.display = "block";
            }
            function closeForm() {
                document.getElementById("createGroupForm").style.display = "none";
            }

        </script>
    </div>

    <div class = 'content'>
        <div >
            <h1>Group List</h1>
        </div>

        <!--
        <div class="groupHeader">
            <ul class=ojList>
                <div class='oj'><li class='oj'>Rank </li></div>
                <div class='oj'><li class='oj'>Username </li></div>
                <div class='oj'><li class='oj'>Codeforces </li></div>
                <div class='oj'><li class='oj'>Atcoder </li></div>
                <div class='oj'><li class='oj'>HackerRank </li></div>
                <div class='oj'><li class='oj'>UVA</li></div>
                <div class='oj'><li class='oj'>Total </li></div>
            </ul>
        </div>
        -->
        
        <?php  
            $groupMemberCount = array();
            for($i=0; $i<count($groupName); $i++){

                $server      = "localhost";
                $password    = "";
                $user        = "root";
                $database    = "programming_assistant";

                $connection = mysqli_connect($server, $user, $password, $database);
                //$userName = $_SESSION["user_name"];

                $sql= "SELECT COUNT(memberHandle) FROM groupInfo WHERE groupName = '$groupName[$i]'";
                $query = mysqli_query($connection,$sql);
                //$num_rows= mysqli_num_rows($query);
                
                
                if($query)
                {
                    $result= mysqli_fetch_array($query,MYSQLI_NUM);
                    $groupMemberCount[$i] = $result[0];                        
                }
            }
        ?>



        <div class="table">
        <table class="userSub" cellspacing="20px"  align='center' style="width:70%">
                <tr>
                    <th>Group Name</th>
                    <th>Members</th>
                </tr>
                <script>
                    var msg = "<?php echo $msg ?>";
                    var N = "<?php echo $num_rows ?>";
                    var temp = ""
                    
                    console.log(msg);
                    console.log(N);
                    
                    var temp2 = <?php echo '["' . implode('", "', $groupName) . '"]' ?>;
                    ///groupMemberCount

                    var grp_memb_cnt = <?php echo '["' . implode('", "', $groupMemberCount) . '"]' ?>;
                    for (var i = 0; i < N; i++) {

                    

                        var url = "<a href='Groups2.php?key="+temp2[i]+"'>"
                        console.log(url);
                        document.write("<tr>");
                        document.write("<td>" + url + temp2[i] + "</a>" + "</td>");
                        document.write("<td>" + grp_memb_cnt[i] + "</td>");
                        document.write("</tr>");
                    }

                    // styling table data
                    const td = document.getElementsByTagName("td");
                    var i;
                    for (i = 0; i < td.length; i++) {
                    td[i].style.textAlign = "center";
                    td[i].style.fontSize = '22px';
                    }

                </script>
            </table>
    </div>


<!-- table-------------------------------------------------------------------->









    </div>

        
    </div>



</body>

</html>
