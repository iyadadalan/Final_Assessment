<?php
session_start();
include("../connection.php");

// Check if username is set in session
if ($_SESSION['user_type'] !== 'admin') {
    // Check if the user role is admin and redirect accordingly
    if (isset($_SESSION['user_type']) && isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    }
}

// Get current username from session
$username = $_SESSION['username'];

// Sanitize and validate inputs
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$password = htmlspecialchars($_POST['password']);
$gender = htmlspecialchars($_POST['gender']);

if ($email === false) {
    echo "Invalid email format.";
    exit();
}

if (!empty($password)) {
    // Hash the password securely
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
} else {
    echo "Password cannot be empty.";
    exit();
}

// Prepare statement to update user data
$query = "UPDATE users SET email=?, password=?, gender=? WHERE username=?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    // Bind parameters and execute statement
    mysqli_stmt_bind_param($stmt, "ssss", $email, $password_hash, $gender, $username);
    mysqli_stmt_execute($stmt);

    // Check if update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile or no changes made.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo "Error preparing statement: " . mysqli_error($con);
}

// Redirect to profile page
header("Location: profile.php");
exit();
?>
