<?php 
session_start();

include("../connection.php");

$query = "select * from users where user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $_SESSION['username'] = $row['username'];
  } else {
    echo "Username not found!";
  }
} else {
  echo "Error: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="
        default-src 'self';
        script-src 'self' ;
        style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;
        img-src 'self' https://images.pexels.com;
        font-src 'self' https://fonts.gstatic.com;
        connect-src 'self';
        frame-src 'none';
        object-src 'none';
        base-uri 'self';">
    <title>SweatFactory - Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">
    <link rel="stylesheet" href="user_index.css">
</head>
<body>
  <header>
    <div class="logo">
      <h1><a href="user_index.php">SWEATFACTORY.</a></h1>
    </div>
    <nav>
      <ul>
        <li><a href="user_index.php">HOME</a></li>
        <li><a href="lifestyle.php">LIFESTYLE</a></li>
        <li><a href="exercises.php">EXERCISES</a></li>
        <li><a href="join-us.php">JOIN US</a></li>
        <li><a href="about-us.php">ABOUT US</a></li>
        <li class="profile-bar">
          <a href="javascript:void(0);" class="dropbtn"><?php echo $_SESSION['username']; ?></a>
          <div class="dropdown-content">
            <a href="profile.php"><img src="../img/usericon.jpg" alt="Profile Icon" style="width:30px;height:30px;margin-right:30px;">Profile</a>
            <a href="../logout.php"><img src="../img/logout.jpg" alt="Logout Icon" style="width:25px;height:25px;margin-right:30px;">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
  </header>

  <div class="container1">
    <div class="background-image">
      <img src="../img/homepage.png" alt="Homepage Image">
      <div class="overlay">
        <h1><em>BE YOUR BEST</em></h1>
        <br><br>
        <a href="join-us.php" class="button">JOIN TODAY</a>
      </div>
    </div>
  </div>

  <div class="container2">
    <div class="left-section">
      <div class="centered-content">
        <h2>ABOUT OUR ORGANIZATION</h2>
        <p>A community-centered gym located in Kuala Lumpur. We are dedicated to helping individuals achieve personal growth through good exercises, good diets, and good habits.</p>
        <a href="about-us.php">Learn More</a>
      </div>
    </div>

    <div class="right-section">
      <img src="../img/home1.png" alt="Image 1" style="margin-bottom: 30%">
      <img src="../img/home2.jpg" alt="Image 2" style="margin-top: 30%">
    </div>
  </div>

  <div class="lifestyle-homepage">
    <br><br><h1>LIFESTYLE</h1>
    <P>Improve your life with these simple tips.</P><br>
    <div class="img-container">
      <div class="image-container">
        <a href="lifestyle.php#diet">
          <img src="../img/diet.png" alt="diet" width="380" height="380">
          <p>DIET</p>
        </a>
      </div>
      <div class="image-container">
        <a href="lifestyle.php#habits">
          <img src="../img/habits.png" alt="habits" width="380" height="380">
          <p>HEALTHY HABITS</p>
        </a>
      </div>
      <div class="image-container">
        <a href="lifestyle.php#bmi">
          <img src="../img/bmi.png" alt="bmi" width="380" height="380">
          <p>BMI<br>CALCULATOR</p>
        </a>
      </div>
    </div>
  </div>

  <div class="exercises-homepage">
    <br><br><h1 id="exercises.php">EXERCISES</h1>
    <P>Our top priority is ensuring that you have the ultimate workout experience.</P><br>
    <div class="img-container">
      <div class="image-container">
        <a href="exercises.php#workout-plan">
          <img src="../img/Exercise.png" alt="exercise" width="380" height="380">
          <p>WORKOUT PLAN</p>
        </a>
      </div>
      <div class="image-container">
        <a href="exercises.php#recommendations">
          <img src="../img/threadmill.png" alt="recommendations" width="380" height="380">
          <p>EXERCISE RECOMMENDATIONS</p>
        </a>
      </div>
    </div>
  </div>

  <footer>
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="lifestyle.php">LIFESTYLE</a></li>
      <li><a href="exercises.php">EXERCISES</a></li>
      <li><a href="join-us.php">JOIN US</a></li>
      <li><a href="about-us.php">ABOUT US</a></li>
    </ul>
    <hr>
    <p>© 2023 SweatFactory Sdn. Bhd. All rights reserved.</p>
    <div class="social-icons">
      <a href="https://twitter.com/home"><img src="../img/twitter-black.png" alt="twitter-icon" width="30px" height="30px"></a>
      <a href="https://www.facebook.com"><img src="../img/facebook-black.png" alt="facebook-icon" width="30px" height="30px"></a>
      <a href="https://www.instagram.com"><img src="../img/instagram-black.png" alt="instagram-icon" width="30px" height="30px"></a>
      <a href="https://mail.google.com"><img src="../img/gmail-black.png" alt="gmail-icon" width="30px" height="30px"></a>
      <a href="https://wa.me/+60123456789"><img src="../img/whatsapp-black.png" alt="whatsapp-icon" width="30px" height="30px"></a>
    </div>
  </footer>
  <script src="user_index.js"></script>
</body>
</html>
