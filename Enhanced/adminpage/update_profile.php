<?php
session_start();
include("../connection.php");
include("../functions.php");

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];

if (!empty($password)) {
    $password_hash = md5($password);
    $query = "UPDATE users SET username='$username', email='$email', password='$password_hash', gender='$gender' WHERE username='$username'";
}

if (mysqli_query($con, $query)) {
    echo "Profile updated successfully!";
} else {
    echo "Error updating profile: " . mysqli_error($con);
}

header("Location: profile.php");
?>
