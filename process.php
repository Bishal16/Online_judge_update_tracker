<?php
include_once 'database.php';
if(isset($_POST['btn-save']))
{
    // variables for input data
$userName = $_POST['userName'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city_name = $_POST['city_name'];
$email = $_POST['email'];
// sql query for inserting data into database

mysqli_query($conn,"insert into myuser (userName,first_name,last_name,city_name,email) values ('$userName','$first_name','$last_name','$city_name','$email')") or die(mysqli_error());
echo "<p align=center>Data Added Successfully.</p>";
}
header("Location:retrieve.php");
?>