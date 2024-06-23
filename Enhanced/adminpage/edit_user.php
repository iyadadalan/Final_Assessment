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
$id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
if (!$id) {
    die("User ID is required.");
}

// Handle user update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['user_id'];
    $username = htmlspecialchars($_POST['username']);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $gender = htmlspecialchars($_POST['gender']);
    $user_type = htmlspecialchars($_POST['user_type']);

    if ($email === false) {
        die("Invalid email format.");
    }

    // Initialize the query
    $query = "UPDATE users SET username = ?, email = ?, gender = ?, user_type = ?";

    // Check if password is provided
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query .= ", password = ?";
    }

    $query .= " WHERE user_id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    if (!empty($_POST['password'])) {
        $stmt->bind_param('sssssi', $username, $email, $gender, $user_type, $password, $id);
    } else {
        $stmt->bind_param('ssssi', $username, $email, $gender, $user_type, $id);
    }

    // Execute the statement and check the result
    if ($stmt->execute()) {
        header("Location: dashboard.php?msg=Data updated successfully");
        exit();
    } else {
        echo "Failed: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Fetch user details
$stmt = $conn->prepare("SELECT * FROM users WHERE user_id = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();

if (!$result) {
    die("User not found.");
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="edit-user-container">
        <h1>Edit User</h1>
        <form action="edit_user.php?user_id=<?php echo $id; ?>" method="post">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($result['username']); ?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($result['email']); ?>" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php if ($result['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($result['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
            <label for="user_type">User Type:</label>
            <select id="user_type" name="user_type" required>
                <option value="User" <?php if ($result['user_type'] == 'User') echo 'selected'; ?>>User</option>
                <option value="Admin" <?php if ($result['user_type'] == 'Admin') echo 'selected'; ?>>Admin</option>
            </select>
            <button type="submit" name="update">Update User</button>
        </form>
    </div>
</body>
</html>
