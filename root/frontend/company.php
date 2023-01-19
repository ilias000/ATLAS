<?php
session_start();

include("../backend/connection.php");
include("../backend/functions.php");

$user_data = check_login($connection); // If the user is not logged in they will be redirected to the loginSignup page else the user_data variable will contain their information.
?>

<!DOCTYPE html>
<html>

<head>
    <title>Εταιρεία</title>
</head>

<body>
    <a href="../backend/logout.php">Logout</a>
    <h1>Αρχική σελίδα Εταιρείας!</h1>

    <br>

    Hello, <?php echo $user_data['email']; ?>
</body>

</html>