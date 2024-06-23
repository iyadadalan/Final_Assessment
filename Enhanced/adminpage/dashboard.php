<?php
session_start();
include("../connection.php");

// Ensure admin is logged in
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit();
}
function random_num($length) {
    $text = '';
    if ($length < 5) {
        $length = 5;
    }
    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        $text .= rand(0, 9);
    }
    return $text;
}
// Handle user creation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $user_type = $_POST['user_type'];

	$user_id = random_num(5);
	$query = "insert into users (user_id,email,password,username,gender,user_type) values ('$user_id','$email','$password','$username','$gender', '$user_type')";
    mysqli_query($conn, $query);
}

// Fetch all users
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
    <a href="admin_index.php"><img src="../img/home.png" alt="Home" style="width:42px;height:42px;"></a>
        <h1>Admin Dashboard</h1>
        <div class="user-records">
            <h2>User Records</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>User Type</th>
                    <th>Actions</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['user_type']); ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['user_id']; ?>">Edit</a>
                        <a href="delete_user.php?delete=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="create-user">
            <h2>Create User</h2>
            <form action="dashboard.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <label for="user_type">User Type:</label>
                <select id="user_type" name="user_type" required>
                    <option value="User">User</option>
                    <option value="Admin">Admin</option>
                </select>
                <button type="submit" name="create">Create User</button>
            </form>
        </div>
    </div>
</body>
</html>
