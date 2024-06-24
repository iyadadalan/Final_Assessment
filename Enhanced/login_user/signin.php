<?php
session_start();
include("../connection.php");
// Unset all of the session variables

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (!empty($email) && !empty($password)) {
        // Prepare the stored procedure call to get user details by email
        if ($stmt = $conn->prepare("CALL GetUserByEmail(?)")) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $user_data = $result->fetch_assoc();

                if (password_verify($password, $user_data['password'])) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    $_SESSION['username'] = $user_data['username'];
                    $_SESSION['email'] = $user_data['email'];
                    $_SESSION['user_type'] = $user_data['user_type'];

                    if ($user_data['user_type'] == 'admin') {
                        header('Location: ../adminpage/admin_index.php');
                    } elseif ($user_data['user_type'] == 'user') {
                        header('Location: ../au_userpage/user_index.php');
                        
                    }
                    exit;
                } else {
                    // Password verification failed
                    echo '<script>
                        alert("Login failed. Invalid email or password!");
                        window.location.href = "signin.php";
                    </script>';
                }
            } else {
                // User not found
                echo '<script>
                    alert("Login failed. Invalid email or password!");
                    window.location.href = "signin.php";
                </script>';
            }
            $stmt->close();
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo '<script>
            alert("Please enter some valid information!");
            window.location.href = "signin.php";
        </script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="loginUser.css">
</head>
<body>
    <div id="form">
        <h1>Login</h1>
        <form method="POST" autocomplete="off">
            <label>Email: </label>
            <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required></br></br>
            <label>Password: </label>
            <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required></br></br>
            <input type="submit" id="btn" value="Submit"><br><br>
            <a href="../register_user/signup.php">Click to Sign Up</a>
        </form>
    </div>
</body>
</html>
