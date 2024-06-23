<?php
include("../connection.php");

// Check if username is set in session
if ($_SESSION['user_type'] !== 'admin') {
  // Check if the user role is admin and redirect accordingly
  if (isset($_SESSION['user_type']) && isset($_SESSION['username'])) {
      header("Location: ../index.php");
      exit();
  }
} else {
  echo "Not logged in.";
}
// Handle user deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM users WHERE user_id='$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Data deleted successfully");
      } else {
        echo "Failed: " . mysqli_error($con);
      }
}


?>