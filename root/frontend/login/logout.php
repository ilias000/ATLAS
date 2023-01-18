<?php

session_start(); // You need this on every page you use the $_SESSION variable.

if (isset($_SESSION['user_id'])) { // Checking if the SESSION has been set because you do not want to unset a value that has not been set.
    unset($_SESSION['user_id']);
}

// Redirecting the user to the login page.
header("Location: login.php");
die;
