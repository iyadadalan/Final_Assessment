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
// Handle user deletion
if (isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $query = "DELETE FROM users WHERE user_id='$id'";
    $result = mysqli_query($conn, $query);

// Prepare an SQL statement for execution
$stmt = $conn->prepare("DELETE FROM users WHERE user_id = ?");
if ($stmt) {
    // Bind variables to the parameter markers of the prepared statement
    $stmt->bind_param("i", $id);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Data deleted successfully");
      } else {
        echo "Failed: " . mysqli_error($conn);
      }
}
?>
