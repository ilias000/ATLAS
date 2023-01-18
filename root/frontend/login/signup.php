<?php
session_start(); // You need this on every page you use the $_SESSION variable.

// Include the required files.
include("../../backend/connection.php");
include("../../backend/functions.php");

// Checking if the user has clicked on the post button.
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // If something was posted
    // Collect the users data.
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Checking the username and password.
    if (!empty($username) && !empty($password) && !is_numeric($username)) { // If there are not empty and username is not a number.

        // Create user_id for the session of the user.
        $max_length = 20;
        $user_id = random_number($max_length); // Creating a random user_id.

        // Save to database.
        $query = "INSERT INTO users (user_id, username, password) VALUES ('$user_id', '$username', '$password')";
        mysqli_query($connection, $query);

        // Redirect the user to the login page so they can login.
        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Signup</title>
</head>

<body>
    <style type="text/css">
        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }
    </style>

    <div id="box">
        <form method="post">
            <div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
            <input id="text" type="text" name="username"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>

</html>