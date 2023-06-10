<?php

include 'db_connection.php';

// Retrieve form data and sanitize it
$first_name = $conn->real_escape_string($_POST['first_name']);
$last_name = $conn->real_escape_string($_POST['last_name']);
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$repeat_password = $conn->real_escape_string($_POST['repeat-password']);

// Check if password and repeat-password match
if ($password != $repeat_password) {
    die("Error: Passwords do not match");
}

// Query to insert user information into the database
$sql = "INSERT INTO UserAccount (first_name, last_name, username, email, password) 
        VALUES ('$first_name', '$last_name', '$username', '$email', '$password')";

// Execute the SQL query and check for errors
if ($conn->query($sql) === TRUE) {
    // Redirect user to Package page
    header('Location: Package.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the MySQL database connection
$conn->close();
?>