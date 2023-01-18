<?php
session_start();

include("../../backend/connection.php");
include("../../backend/functions.php");

$user_data = check_login($connection); // If the user is not logged in they will be redirected to the login page else the user_data variable will contain their information.
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Website</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <h1>This is the index page</h1>

    <br>

    Hello, <?php echo $user_data['username']; ?>
</body>

</html>