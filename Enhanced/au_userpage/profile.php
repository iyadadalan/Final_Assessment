<?php
session_start();
include("../connection.php");
include("../functions.php");

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the user's information
$username = $_SESSION['username'];
$query = "SELECT username, email, password, gender, user_type FROM users WHERE username = '$username'";
$result = mysqli_query($con, $query);

if ($result) {
    $user_data = mysqli_fetch_assoc($result);
    if ($user_data) {
        // Censor the password
        $censored_password = str_repeat('*', (5));
    } else {
        echo "User not found!";
        exit();
    }
} else {
    echo "Error: " . mysqli_error($con);
    exit();
}
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
