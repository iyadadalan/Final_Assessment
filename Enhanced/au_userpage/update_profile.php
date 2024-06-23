<?php
session_start();
include("../connection.php");

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's username
$username = $_SESSION['username'];

// Retrieve and sanitize the input data
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);

// Check if the password is provided
if (!empty($password)) {
    // Hash the password using a strong algorithm
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Use a prepared statement to prevent SQL injection
    $query = "UPDATE users SET email = ?, password = ?, gender = ? WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $email, $password_hash, $gender, $username);
} else {
    // If the password is not provided, update other fields only
    $query = "UPDATE users SET email = ?, gender = ? WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $email, $gender, $username);
}

// Execute the prepared statement and check the result
if ($stmt->execute()) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to profile page
header("Location: profile.php");
exit();
?>
