<?php 

session_start();

include("../connection.php");
include("../functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if(!empty($email) && !empty($password))
    {
        //read from database
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if(md5($password) == $user_data['password'])
                {
                    if($user_data['user_type'] == 'admin'){

                        $_SESSION['user_id'] = $user_data['user_id'];
                        $_SESSION['username'] = $user_data['username'];
                        header('location:../adminpage/admin_index.php');
               
                    }elseif($user_data['user_type'] == 'user'){
               
                        $_SESSION['user_id'] = $user_data['user_id'];
                        $_SESSION['username'] = $user_data['username'];
                        header('location:../au_userpage/user_index.php');
               
                    }
               
                }
            }
        }
        
        echo  '<script>
                     window.location.href = "signin.php";
                     alert("Login failed. Invalid email or password!")
                 </script>';
    }else
    {
        echo  '<script>
                     window.location.href = "signin.php";
                     alert("Login failed. Invalid email or password!")
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