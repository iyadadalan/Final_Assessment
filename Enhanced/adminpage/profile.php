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

$username = $_SESSION['username'];

// Prepare statement to retrieve user data
$query = "SELECT username, email, gender, user_type FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $query);

// Bind parameters and execute statement
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

// Get result
$result = mysqli_stmt_get_result($stmt);

if ($result) {
    $user_data = mysqli_fetch_assoc($result);
    if ($user_data) {
        // Censor the password (not fetching password for security reasons)
        $censored_password = "*****"; // Replace with appropriate logic if needed
    } else {
        echo "User not found!";
        exit();
    }
} else {
    echo "Error: " . mysqli_error($con);
    exit();
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
    <script src="profile.js"></script>
</head>
<body>
    <div class="profile-container">
        <h1>Profile Information</h1>
        <div class="profile-info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user_data['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user_data['email']); ?></p>
            <p><strong>Password:</strong> <?php echo htmlspecialchars($censored_password); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($user_data['gender']); ?></p>
            <p><strong>User Type:</strong> <?php echo htmlspecialchars($user_data['user_type']); ?></p>
        </div>
        <button id="update-btn" onclick="toggleUpdateForm()">Update Information</button>
        <div id="update-form" class="update-form" style="display:none;">
            <form action="update_profile.php" method="post">
                <label for="username">Email:</label>
                <input type="username" id="username" name="username" value="<?php echo htmlspecialchars($user_data['username']); ?>" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user_data['email']); ?>" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="Male" <?php if ($user_data['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if ($user_data['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
