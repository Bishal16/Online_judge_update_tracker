

<?php
include 'profile_nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/profile_card.css">
    <link rel="icon" href="images/icon-main.png">
    <title>Profile</title>

</head>

<body>

    <?php include('profile_card.php'); ?>





    <div class='content'>
        <div>
            <h1><?php echo $_SESSION['user_name']?></h1>
            <div class="table">
                <table align="center" cellspacing="20px" class="userSub">
                    <tr>
                        <th>Online Judge</th>
                        <th>profile</th>
                        <th># Solved</th>
                        <th>Contest Ratting</th>
                    </tr>


                    <script>
                        const tableSize = 10;

                        for (var i = 0; i < tableSize; i++) {
                            console.log('ekhn table')
                            document.write("<tr>");
                            document.write("<td id='userName" + i + "'>" + "--" + "</td>");
                            document.write("<td id='timeSubmitted" + i + "'>" + "--" + "</td>");
                            document.write("<td id='problemName" + i + "'>--</td>");
                            document.write("<td id='ojName" + i + "'>--</td>");
                        }
                    </script>
                </table>
            </div>



        </div>
</body>

</html>