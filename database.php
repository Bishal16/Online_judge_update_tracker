<?php
$server      = "localhost";
$password    = "";
$user        = "root";
$database    = "programming_assistant";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die('Could not Connect My Sql:' . mysql_error());
}

?>