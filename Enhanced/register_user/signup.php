<?php 
session_start();
include("../connection.php");

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

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $user_name = htmlspecialchars($_POST['user_name']);
    $gender = htmlspecialchars($_POST['gender']);
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
        <link rel="stylesheet" type="text/css" href="signup.css">
    </head>
    <body>
        
        <div id="form">
            <h1>Sign Up</h1>
            <form onsubmit="isvalid()" method="POST" autocomplete="off">
                <label>Full Name: </label>
                <input type="text" id="user_name" name="user_name" pattern="^[a-zA-Z]+(?: [a-zA-Z]+(?: [a-zA-Z]+(?: (?:bin|ibn) )*[a-zA-Z]+)*)*(?: @ [a-zA-Z]+)?$" required><br><br>
                
                <label>Email: </label>
                <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required><br><br>
                
                <label>Password: </label>
                <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required><br><br>
                
                <label>Gender: </label>
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
