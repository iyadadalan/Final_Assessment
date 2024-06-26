<?php
session_start();
include("../connection.php");
include("../security_utils.php");
// Ensure CSRF token is generated if not present
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = generate_csrf_token();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (!verify_csrf_token($_POST['csrf_token'])) {
        die('CSRF token validation failed.');
    }
       // Regex patterns for validation
       $regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
       $regex_password = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
   
       // Validate input
       if (!preg_match($regex_email, $email) || !preg_match($regex_password, $password)) {
           echo '<script>
               alert("Invalid email or password format!");
               window.location.href = "signin.php";
           </script>';
           exit;
       }

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
                echo '<script>alert("Invalid email or password!");</script>';
            }
        } else {
            echo '<script>alert("No user found with that email!");</script>';
        }
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }
}
?>
<?php
session_start();
include("../connection.php");
include("security_utils.php");

$csrf_token = generate_csrf_token();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!verify_csrf_token($_POST['csrf_token'])) {
        die('CSRF token validation failed.');
    }

    // Sanitize and validate inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Assuming password sanitation occurs during hashing

    // Regex patterns for validation
    $regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $regex_password = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/";

    if (!preg_match($regex_email, $email) || !preg_match($regex_password, $password)) {
        echo '<script>
            alert("Invalid email or password format!");
            window.location.href = "signin.php";
        </script>';
        exit;
    }

    // Database operations
    if ($stmt = $conn->prepare("CALL GetUserByEmail(?)")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            if (password_verify($password, $user_data['password'])) {
                // Set session variables and redirect based on user type
                $_SESSION['user_id'] = $user_data['user_id'];
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['user_type'] = $user_data['user_type'];
                header('Location: ' . ($user_data['user_type'] == 'admin' ? '../adminpage/admin_index.php' : '../au_userpage/user_index.php'));
                exit;
            } else {
                echo '<script>alert("Invalid email or password!");</script>';
            }
        } else {
            echo '<script>alert("No user found with that email!");</script>';
        }
        $stmt->close();
    } else {
        echo "Database error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; connect-src 'self'; font-src 'self'; base-uri 'self'; form-action 'self';">
    <link rel="stylesheet" type="text/css" href="loginUser.css">
    <script src="signin_validation.js"></script>
</head>
<body>
    <div id="form">
        <a href="../index.php"><img src="../img/backbutton.png" alt="Back" style="width:42px;height:42px;margin-right:500px;"></a>
        <h1>Login</h1>
        <form method="POST" autocomplete="off">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <label>Email: </label>
            <input type="email" id="email" name="email" required></br></br>
            <label>Password: </label>
            <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required></br></br>
            <!-- Add CSRF token field -->
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="submit" id="btn" value="Submit"><br><br>
            <a href="../register_user/signup.php">Click to Sign Up</a>
        </form>
    </div>
</body>
</html>
