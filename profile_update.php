<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    $user_name =  $_SESSION['user_name'];

    include_once 'profile_nav.php';
    include_once 'database.php';
    if (count($_POST) > 0) {
        mysqli_query($conn, "UPDATE userinfo set email = '" . $_POST['email'] . "', handleCf='" . $_POST['handleCf'] . "',handleAc='" . $_POST['handleAc'] . "' , handleCc='" . $_POST['handleCc'] . "' ,handleUv='" . $_POST['handleUv'] . "' WHERE userName='" . $user_name . "'");
        $message = "Record Modified Successfully";
    }

    $result = mysqli_query($conn, "SELECT * FROM userinfo WHERE userName ='$user_name' ");
    $row = mysqli_fetch_array($result);
?>




<html>
<head>
    <title>Programming Assistant</title>
    <link rel="icon" href="images/icon-main.png">
    <link rel="stylesheet" type="text/css" href="css/style_update.css" />
</head>

<body>
    <form  name="frmUser" method="post" action="">
        <div >
            <div class="message">
                <?php //if (isset($message)) { echo $message; } ?> 
            </div>

            <div style="padding-bottom:5px;">
                <!--<a href="retrieve.php" class="link"><img alt='List' title='List' src='images/icon-profile.png' width='15px' height='15px' /> List User</a>-->
            </div class = 'formBox'>
                <table align='center' border="0" cellpadding="10" cellspacing="0" width="500" class="tblSaveForm">
                    <tr class="header">
                        <td colspan="2">Update User Info.</td>
                    </tr>
                    
                    <tr>
                        <td><label>Email</label></td>
                        <td><input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>"></td>
                    </tr>
                    <td><label>CF Handle</label></td>
                    <td><input type="text" name="handleCf" class="txtField" value="<?php echo $row['handleCf']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>AC Handle</label></td>
                        <td><input type="text" name="handleAc" class="txtField" value="<?php echo $row['handleAc']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label>CC Handle</label></td>
                        <td><input type="text" name="handleCc" class="txtField" value="<?php echo $row['handleCc']; ?>"></td>
                    </tr>

                    <tr>
                        <td><label>Uva Handle</label></td>
                        <td><input type="text" name="handleUv" class="txtField" value="<?php echo $row['handleUv']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
                    </tr>
                </table>
        </div>
    </form>
</body>

</html>