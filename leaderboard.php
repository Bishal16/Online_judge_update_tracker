<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_leaderboard.css">
    <link rel="icon" href="images/icon-main.png">
    <title>Programming Assistant</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
</head>

<body>

    <div  class = 'navbarBox'>
    <div class = 'navLeft';>
            <ul class="navBarUl">
                <li class="navBarList" >
                    <img class ='nav_icon' src="images/icon-home.png" alt="home icon"/>
                    <a href="homepage.php"> Home</a>
                </li>
                <li class="navBarList">
                    <img class ='nav_icon' src="images/icon-group.png" alt="home icon"/>
                    <a href="groups.php">Groups</a>
                </li>
                <li class="navBarList" style="font-weight:bold"> 
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

    <div class = 'content'>
        <div >
            <h1>Global Leaderboard</h1>
        </div>


            <!-- bring all users name from database -->
        <?php
            $server      = "localhost";
            $password    = "";
            $user        = "root";
            $database    = "programming_assistant";

            $connection = mysqli_connect($server, $user, $password, $database);
            //$userName = $_SESSION["user_name"];

            $sql= "SELECT userName  FROM userinfo";
            $query = mysqli_query($connection,$sql);
            //$num_rows= mysqli_num_rows($query);
            
            if($query)
            {
                $result= mysqli_fetch_array($query,MYSQLI_NUM);
                    
                for ($i = 0; $i < 1 ; $i++) {
                    echo count($result) ."<br>";
                  }
                
            }
        ?>
        <script>
            
            var userList = [
                {name:'Mahathir_CSE16', solved : 0},
                {name:'ashik.mahmud',solved:0},
                {name:'rukon', solved : 0},
                {name:'LABIB_AHMED',solved:0},
                {name:'Suborno_Deb_Bappon', solved : 0},
                {name:'mamun071',solved:0},

            
            
            
            
            
            ];
            let problemName = new Set();

            async function getData(serial){
                console.log("retrieving api data");
                

                const response = await fetch(apiUrl);
                const data = await response.json();
                console.log(data.result);
                console.log("retrieving done",serial);
               
                
                for(var i=0; i < data.result.length; i++){
                    //console.log(data.result[i].problem.name);
                    if(data.result[i].verdict==='OK')
                        problemName.add(data.result[i].problem.name) ;
                }
                

               
                userList[serial].solved =  problemName.size;
                problemName.clear();
                console.log(userList[serial].solved+1);
                 
               
            }
            
            
            for(let i=0; i<userList.length; i++){
                setTimeout(function()  {
                    apiUrl = 'https://codeforces.com/api/user.status?handle='+userList[i].name; 
                ///console.log(apiurl)
                    getData(i);
                }, 1000);
               
            }
        </script>


        <div class="table">
            <table class="userSub">
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
                        for(var i= 0;i<50;i++){
                         
                         //delay(2000).then(() => console.log('ran after 1 second1 passed'));
                         
                         console.log('ekhn table')
                         document.write("<tr>");
                             document.write("<td id='userName"+i+"'>" + userName +"</td>");
                             document.write("<td id='timeSubmitted'>" +"#st"+"</td>");
                             document.write("<td id='problemName"+i+"'>"+ problemName[i] +"</td>");
                             document.write("<td id='ojName'>" +"Codeforces"+"</td>");
                             document.write("<td id='Language"+i+"'>" + Language[i] +"</td>");
                             document.write("<td id='verdict"+i+"'>" + verdict[i] +"</td>");
                             document.write("<td id='timeUsed"+i+"'>" + timeUsed[i] +"</td>");
                         document.write("</tr>");
                         }

                         setTimeout(() => {
                            console.log('-------------------');
                            for(var i= 0;i<50;i++){
                                //console.log(problemName[i]);
                                document.getElementById('userName'+i).textContent = userName;
                                document.getElementById('timeSubmitted').textContent = "#st";
                                document.getElementById('problemName'+i).textContent = problemName[i]; 
                                document.getElementById('ojName').textContent = "Codeforces";
                                document.getElementById('Language'+i).textContent = Language[i];
                                document.getElementById('verdict'+i).textContent = verdict[i];
                                document.getElementById('timeUsed'+i).textContent = timeUsed[i];
                            }
                         }, 3000);
                </>
            </table>
        </div>
        

    </div>

        
    </div>



</body>

</html>
