<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } else {
        // Prepare the stored procedure call
        if ($stmt = $conn->prepare("CALL GetUserByEmail(?)")) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                // User found, verify the password
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    // Password verification successful, set session variables
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;

                    // Redirect to index.php
                    header("Location: join-us.html");
                    exit;
                } else {
                    // Password verification failed, redirect back to login page with error message
                    $error = "Invalid email or password";
                }
            } else {
                // User not found, redirect back to login page with error message
                $error = "Invalid email or password";
            }
            $stmt->close();
        } else {
            $error = "Database error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="
    default-src 'self';
    script-src 'self' https://code.jquery.com https://cdn.jsdelivr.net https://ajax.googleapis.com 'unsafe-inline';
    style-src 'self' https://fonts.googleapis.com 'unsafe-inline';
    img-src 'self' https://images.pexels.com data:;
    font-src 'self' https://fonts.gstatic.com;
    frame-src 'self' https://www.google.com;
    connect-src 'self';
    media-src 'self';
    object-src 'none';
    child-src 'none';">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="formValidation.js"></script> <!-- Link to your JavaScript file -->

</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required pattern="[^\s@]+@[^\s@]+\.[^\s@]+" title="Enter a valid email address"><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a>.</p>
    </div>
</body>
</html>
