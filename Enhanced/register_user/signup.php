<?php 
session_start();
include("../connection.php");
include("security_utils.php");

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

$csrf_token = generate_csrf_token(); // Generate a new CSRF token

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Verify CSRF token
    if (!verify_csrf_token($_POST['csrf_token'])) {
        die('CSRF token validation failed.');
    }

    // Sanitize and validate inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Password will be hashed, no need to sanitize
    $user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $user_type = 'user';

    if (!empty($email) && !empty($password)) {
        // Hash the password using password_hash
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        // Generate a random user ID
        $user_id = random_num(5);

        // Prepare the stored procedure call
        if ($stmt = $conn->prepare("CALL RegisterUser(?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("ssssss", $user_id, $email, $password_hash, $user_name, $gender, $user_type);
            $stmt->execute();
            $stmt->close();

            // Redirect to login page
            header("Location: ../login_user/signin.php");
            die;
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="Content-Security-Policy" content="
            default-src 'self';
            script-src 'self';
            style-src 'self' https://fonts.googleapis.com;
            font-src 'self' https://fonts.gstatic.com;
            img-src 'self';
            form-action 'self';
            connect-src 'self';
            frame-ancestors 'none';
            base-uri 'self';">
        <link rel="stylesheet" type="text/css" href="signup.css">
        <script src="signup_validation.js"></script>
    </head>
    <body>
        
        <div id="form">
            <a href="../index.php"><img src="../img/backbutton.png" alt="Back" style="width:42px;height:42px;margin-right:500px;"></a>
            <h1>Sign Up</h1>
            <form onsubmit="return validateForm();" method="POST" autocomplete="off">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                <label>Full Name:</label>
                <input type="text" id="user_name" name="user_name" required><br><br>
                <label>Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <label>Password:</label>
                <input type="password" id="password" name="password" required><br><br>
                <label>Gender:</label>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="female">Female</label><br><br>
                <input type="submit" id="btn" value="Submit"><br><br>
                <a href="../login_user/signin.php">Click to Login</a><br><br>
            </form>
        </div>
    </body>
</html>

