<?php
session_start();
?>



<?php

$userHandle = $_SESSION['user_name'];

$groupName = $_GET['key'];

?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_groups.css">
    <link rel="icon" href="images/icon-main.png">
    <title>Programming Assistant</title>
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
      <!--      <------------------------------required------------------------------re>                                                    -->
      
        <div class='grpName'>
            <h1 class='grpName'><?php echo $groupName ?> </h1>
        </div>

        <div class="groupHeader">
            <ul class=ojList>
                <div class='oj'><li class='oj'>Rank </li></div>
                <div class='oj'><li class='oj'>Username </li></div>
                <div class='oj'><li class='oj'>Codeforces </li></div>
                <div class='oj'><li class='oj'>Atcoder </li></div>
                
                <div class='oj'><li class='oj'>UVA</li></div>
                <div class='oj'><li class='oj'>Total </li></div>
            </ul>

        </div>
       
        
        
        <!--            --------------------------------------Add member form------------------------- --> 
        <button class="menu" style="float: right" onclick="openForm()">Add Member</button>
        <div class="form-popup" id="addMemberForm">
            <form action="actionOnAddMember.php" class="groupForm" method="post">
                <h1>Add member</h1>
                <label for="userName"><b>User Name</b></label>
                <input type="hidden" value="<?php echo $groupName?>" name="groupName">
                <input type="hidden" value="<?php echo $userHandle?>" name="sessionUser">
                <input type="hidden" value="addMember" name="task">
                <input type="text" placeholder="Enter User Name (to be added)" name="userName" required>
                <button type="submit" class="btn">Add to the group</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>

        </div>
        
        
        <!----------------------------------------Remove member form------------------------- --> 
        <button class="menu" style="float: right" onclick="openForm2()">Remove Member</button>
        <div class="form-popup" id="removeMemberForm">
            <form action="actionOnAddMember.php" class="groupForm" method="post">
                <h1>Remove member</h1>
                <label for="userName"><b>User Name</b></label>
                <input type="hidden" value="<?php echo $groupName?>" name="groupName">
                <input type="hidden" value="<?php echo $userHandle?>" name="sessionUser">
                <input type="hidden" value="removeMember" name="task">
                <input type="text" placeholder="Enter User Name (to be removed)" name="userName" required>
                <button type="submit" class="btn">Remove from the group</button>
                <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
            </form>

        </div>
        
        
        
        <script>
            //<!----------------------------------------add member form------------------------- --> 
            function openForm() {
                document.getElementById("addMemberForm").style.display = "block";
            }
            function closeForm() {
                document.getElementById("addMemberForm").style.display = "none";
            }
            
            //----------------------------------------Remove member form------------------------- --> 
            function openForm2() {
                document.getElementById("removeMemberForm").style.display = "block";
            }
            function closeForm2() {
                document.getElementById("removeMemberForm").style.display = "none";
            }

        </script>
        
        
        <table class="userSub" align= 'center' cellspacing="20px" >
            <tr>
                <th>User Name</th>
                <th>Submission Time</th>
                <th>Problem</th>
                <th>Online Judge</th>
                <th>Used Language</th>
                <th>Verdict</th>
                <th>Time Taken</th>
            </tr>
            <script>
                for(var i= 0;i<10;i++){
                    document.write("<tr>");
                    
                        document.write("<td>" +"#user"+"</td>");
                        document.write("<td>" +"#st"+"</td>");
                        document.write("<td>" +"#prob"+"</td>");
                        document.write("<td>" +"#Oj"+"</td>");
                        document.write("<td>" +"#lan"+"</td>");
                        document.write("<td>" +"#ver"+"</td>");
                        document.write("<td>" +"#time"+"</td>");
                    document.write("</tr>");
                }
                
            
            
            </script>
            
        </table>

    </div>

</body>

</html>