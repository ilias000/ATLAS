<?php

$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "sdi1800335";

if (!$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_name)) // If it does not work close and print error.
{
    die("Failed to connect with Database!");
}
