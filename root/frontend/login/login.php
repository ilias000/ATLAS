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

        // Read from database.
        $query = "SELECT * FROM users WHERE username = '$username' limit 1";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) // If the result is positive and the number of rows is greater than 0.
        {
            $user_data = mysqli_fetch_assoc($result); // Taking the associative array (key - value array).
            if ($user_data['password'] === $password) {
                // The login was successful
                // Set the SESSION id.
                $_SESSION["user_id"] = $user_data['user_id'];
                // Redirect the user to the index page.
                header("Location: index.php");
                die;
            }
        }
        echo "Wrong username or password!";
    } else {
        echo "Please enter some valid information!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
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
            <div style="font-size: 20px;margin: 10px;color: white;">Login</div>
            <input id="text" type="text" name="username"><br><br>
            <input id="text" type="password" name="password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>

</html>