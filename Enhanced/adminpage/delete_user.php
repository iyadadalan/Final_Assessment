<?php
include("../connection.php");
include("../functions.php");

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