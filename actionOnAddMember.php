<?php
$nextstage=1;//////////////////////0 means something invalid
$msg = "";////////////////////////Gives error alert if not null

$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "programming_assistant";
$connection = mysqli_connect($server, $user, $password, $database);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $groupName= $_POST["groupName"];
    $userName = $_POST["userName"];
    $sessionUser = $_POST["sessionUser"];
    $task     = $_POST["task"];
   // echo $groupName,$userName,$task,$sessionUser;
    
//-------------------------------------check validity(If user exists)
        $sql     = "SELECT * FROM userinfo WHERE userName = '$userName'";
        $query   = mysqli_query($connection, $sql);
        $num_rows= mysqli_num_rows($query);
        if(!$num_rows){
            $msg = "User does not exist";
            $nextstage = 0;
        }

    
    
    if($nextstage and $task=="addMember"){
        $sql= "Insert into groupinfo (groupName,memberHandle) values('$groupName','$userName')";
        $iquery = mysqli_query($connection,$sql);
        if($iquery)
        {
            echo 'successful q';
        }
        else
        {
            echo 'failed q';
        }    
    
    }elseif($nextstage and $task=="removeMember"){
        ////////////////////////////////////////////////////////check validity(admin can remove)
        //echo"Im here";
        
        $sql= "SELECT adminStatus  FROM groupinfo WHERE memberHandle = '$sessionUser' and groupName = '$groupName'";
        $query = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
              //  echo $row['adminStatus']."<br>";
                $temp = $row['adminStatus'];
            }
        
        if($temp=="Yes"){/////////////////////////adminStatus = Yes
            echo"Im here";
            $sql= "Delete from groupinfo Where groupName = '$groupName' and memberHandle = '$userName'";
            $iquery = mysqli_query($connection,$sql);
            if($iquery)
            {
                echo 'query successful';
            }
            else
            {
                echo 'query failed';
            }  
            
        }elseif($temp=="No"){
             //echo"Im here2";
            $msg = "You are not group admin";
        }
        
    }
        
mysqli_close($connection);

}

?>


<script>
    var msg =  "<?php echo $msg?>"
    
    if( msg != ""){
        setTimeout(alert("<?php echo $msg ?>"),4000);
        console.log("<?php echo $msg ?>");
    }
    window.location.href = "Groups.php";
</script>