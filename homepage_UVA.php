<?php
session_start();
?>


<?php 
    $uva_id = $_GET['uva_id'];
?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/style_homepage.css">
    <link rel="icon" href="images/icon-main.png">
    <title>Programming Assistant</title>
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

    <div class = 'content'>
        <div >
            <h1>Recent Submissions</h1>

        <script> 
         

            async function getDataUVA(){
                console.log("retrieving api data");

                const response = await fetch(apiUrlUVA);
                const data = await response.json();
                console.log('ddd',data);

                const uva_languages =['','ANSI C', 'Java','C++','Pascal','C++11'];
                const uva_verdict_tag = [
                    {no : 10, verdict: 'Submission error'},
                    {no : 15, verdict: 'Can\'t be judged'},
                    {no : 20, verdict: 'In queue'},
                    {no : 30, verdict: 'Compile error'},
                    {no : 35, verdict: 'Restricted function'},
                    {no : 40, verdict: 'Runtime error'},
                    {no : 45, verdict: 'Output limit'},
                    {no : 50, verdict: 'Time limit'},
                    {no : 60, verdict: 'Memory limit'},
                    {no : 70, verdict: 'Wrong answer'},
                    {no : 80, verdict: 'PresentationE'},
                    {no : 90, verdict: 'Accepted'}
                ]
                    
                for(i=0; i<data.subs.length; i++){
                    
                    //console.log(data.result[i].problem.name);

                    userName = data.uname;
                    problemName[i] = data.subs[i][1];
                    timeSubmited[i] = data.subs[i][4];
                    timeUsed[i] = data.subs[i][3];
                    memoryUsed[i] = 'N/A';
                    Language[i] = uva_languages[data.subs[i][5]];
                    verdict[i] = data.subs[i][2];
                    //contestId[i] = data.result[i].contestId;
                    //category[i] = data.result[i].problem.index;

                    //convert from unix format
                    let unix_timestamp = timeSubmited[i];
                    var date = new Date(unix_timestamp * 1000);
                    var hours = date.getHours();
                    var minutes = "0" + date.getMinutes();
                    var seconds = "0" + date.getSeconds();
                    timeSubmited[i] = String(date).slice(0, 25);

                    //converting to text verdict tag
                    for(var j=0; j<uva_verdict_tag.length ; j ++){
                        if (uva_verdict_tag[j].no == verdict[i]){
                            verdict[i] = uva_verdict_tag[j].verdict;
                            break;
                        }
                    }
                }
                console.log("done retriving");
            }


            //connecting database to fing users all oj IDS
            "<?php
                $server      = "localhost";
                $password    = "";
                $user        = "root";
                $database    = "programming_assistant";

                $connection = mysqli_connect($server, $user, $password, $database);
                $userName = $_SESSION["user_name"];

                $sql= "SELECT * FROM userinfo WHERE userName = '$userName'";
                $query = mysqli_query($connection,$sql);
                //$num_rows= mysqli_num_rows($query);
                
                if($query)
                {
                    $result= mysqli_fetch_array($query,MYSQLI_NUM);
                        
                        $handle_cf = $result[3];
                        $handle_ac = $result[4];
                        $handle_cc = $result[5];
                        $handle_uv = $result[6];

                        //$_SESSION['uva_id'] = '896795';
                        
                }
            ?>"

            var handle_cf="<?php echo $handle_cf?>";
            var handle_ac = "<?php echo $handle_ac?>";
            var handle_cc="<?php echo $handle_cc?>"; 
            var handle_uv="<?php echo $handle_uv?>"; 
            
            handle_uv = "<?php echo $uva_id?>"; ////have to change here
            console.log( handle_cf,'--------', handle_ac,'---------', handle_cc,'--------', handle_uv)
          
            var userName = '';
            const problemName = [];
            const timeSubmited = [];
            const timeUsed = [];  
            const memoryUsed = [];
            const Language = [];
            const verdict = [];
            const contestId = [];
            const category = [];


            //apiUrlCF = `https://codeforces.com/api/user.status?handle=${userName}`; 
            //getDataCF();

            apiUrlUVA = `https://uhunt.onlinejudge.org/api/subs-user/${handle_uv}`;
                        
            getDataUVA();
            
            
        </script>
            
        

        <div class="table">
            <table align="center" cellspacing="20px" class="userSub">
                <tr>
                    <th>User Name</th>
                    <th width = '180px'>Submission Time</th>
                    <th>Problem Name</th>

                    <th id = 'online_judge_change'> 
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">Online Judge</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="homepage.php">Codeforces</a>
                                <a href="homepage_AC.php?atcoder_id=<?php echo $handle_ac?>">Atcoder</a>
                            </div>
                        </div>
                    </th>

                    <th>Used Language</th>
                    <th>Verdict</th>
                    <th>Runtime</th>
                </tr>


                <script>
                    
                    //dropdown list toggoling
                    function myFunction() {
                       document.getElementById("myDropdown").classList.toggle("show");
                    }
                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function(event) {
                        if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");

                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                        }
                      }
                    }




                    const tableSize = 100;
                    
                    for(var i= 0; i<tableSize; i++){
                        console.log('ekhn table')
                        document.write("<tr>");
                            document.write("<td id='userName"+i+"'>" + "--" +"</td>");
                            document.write("<td id='timeSubmitted"+i+"'>" + "--"+"</td>");
                            document.write("<td id='problemName"+i+"'>--</td>");
                            document.write("<td id='ojName"+i+"'>--</td>");
                            document.write("<td id='Language"+i+"'>--</td>");
                            document.write("<td id='verdict"+i+"'>--</td>");
                            document.write("<td id='timeUsed"+i+"'>--</td>");
                        document.write("</tr>");
                    }

                    setTimeout(() => {
                        console.log('-------------------');
                        for(var i= 0; i<tableSize; i++){
                            //console.log(problemName[i]);
                            document.getElementById('userName'+i).textContent = userName;
                            document.getElementById('timeSubmitted'+i).textContent = timeSubmited[i];
                            document.getElementById('problemName'+i).textContent = problemName[i];
                            document.getElementById('ojName'+i).textContent = "UVA";
                            document.getElementById('Language'+i).textContent = Language[i];
                            document.getElementById('verdict'+i).textContent = verdict[i];
                            document.getElementById('timeUsed'+i).textContent = timeUsed[i]+' ms';

                            // linking problem name
                            var prbLink = document.getElementById('problemName'+i)
                            prbLink.innerHTML=  '<a href="https://onlinejudge.org/index.php?option=onlinejudge&Itemid=8&page=show_problem&problem="/" target="_blank">'+problemName[i]+'</a>';
                            
                            var profileLink = document.getElementById('userName'+i)
                            let purl ='https://uhunt.onlinejudge.org/u/'+userName;
                            profileLink.innerHTML=  `<a href="${purl}"/" target="_blank">${userName}</a>`;
                            //coloring verdict https://uhunt.onlinejudge.org/u/seventyeoght
                            const verd = document.getElementById('verdict'+i);

                            if(verd.textContent == 'Accepted')
                                verd.style.color = "#28A745";
                            else if(verd.textContent == 'Wrong answer')
                                verd.style.color = "#E61010";
                            else if(verd.textContent == 'Compile error')
                                verd.style.color = "#F55516";
                            else if(verd.textContent == 'Runtime error')
                                verd.style.color = "#9D40C8";
                            else if(verd.textContent == 'Time limit')
                                verd.style.color = "#304088";
                            else if(verd.textContent == 'PresentationE')
                                verd.style.color = "#304078"
                    }
                    }, 3000);
                </script>
                

                
                

                <script>
                    
                </script>
            </table>
        </div>

        

    </div>
</body>

</html>
