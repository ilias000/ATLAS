<?php
function check_login($connection) // If the user is loged in return the data of the user else redirect to login/Signup Page.
{
    // Checking if there is a session_id inside SESSION.
    if (isset($_SESSION['session_id'])) {
        // Checking if the id exists in the database.
        $id = $_SESSION["session_id"];
        $query = "SELECT * FROM users WHERE session_id = '$id' limit 1";
        $result = mysqli_query($connection, $query);
        if ($result && mysqli_num_rows($result) > 0) // If the result is positive and the number of rows is greater than 0.
        {
            $user_data = mysqli_fetch_assoc($result); // Taking the associative array (key - value array).
            return $user_data;
        }
    }

    // Redirect to loginSignup in case something is not correct (SESSION value does not exists or it exists but is not in the database).
    header("Location: loginSignup.php");
    die; // So the code does not continue.
}

function random_number($max_length) // Returns a random number with at least 4 digits.
{
    $number = ""; // Will save the random number.

    if ($max_length < 5) // Making the max_length always at least 5.
    {
        $max_length = 5;
    }

    $length = rand(4, $max_length); // Random number from 4 until max_length to decide the actual length of the random number.

    for ($i = 0; $i < $length; $i++) // Deciding every digit of the random number.
    {
        $number .= rand(0, 9);
    }
    return $number;
}
