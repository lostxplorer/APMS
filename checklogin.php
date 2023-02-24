<?php

include 'DBConnect.php';
// Retrieve the user's input from the form
$username = $_POST['username'];
$password = $_POST['password'];



// Retrieve the user's data from the database
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

// Compare the user's input with the database data
if (mysqli_num_rows($result) > 0) {
    // User is logged in
    header("Location: dashboard.php");
} else {
    // Login failed
    echo "Invalid username or password";
}

// Close the database connection
mysqli_close($conn);
?>
