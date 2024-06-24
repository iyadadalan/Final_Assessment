<?php 
session_start();

include("../connection.php");

$query = "select * from users where user_id = " . $_SESSION['user_id'];
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
// Check if username is set in session
if ($_SESSION['user_type'] !== 'admin') {
  // Check if the user role is admin and redirect accordingly
  if (isset($_SESSION['user_type']) && isset($_SESSION['username'])) {
      header("Location: ../index.php");
      exit();
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
    <title>SweatFactory - About Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">
    <link rel="stylesheet" type="text/css" href="about-us.css">
</head>
<body>
    <header>
        <div class="logo">
          <h1><a href="admin_index.php">SWEATFACTORY.</a></h1>
        </div>
        <nav>
          <ul>
            <li><a href="admin_index.php">HOME</a></li>
            <li><a href="lifestyle.php">LIFESTYLE</a></li>
            <li><a href="exercises.php">EXERCISES</a></li>
            <li><a href="join-us.php">JOIN US</a></li>
            <li><a href="about-us.php">ABOUT US</a></li>
            <li class="profile-bar">
          <a href="javascript:void(0);" class="dropbtn"><?php echo $_SESSION['username']; ?></a>
          <div class="dropdown-content">
          <a href="profile.php"><img src="../img/usericon.jpg" alt="Profile Icon" style="width:30px;height:30px;margin-right:30px;">Profile</a>
            <a href="dashboard.php"><img src="../img/dashboard.png" alt="Dashboard Icon" style="width:30px;height:30px;margin-right:110px;">Dashboard</a>
            <a href="../logout.php"><img src="../img/logout.jpg" alt="Logout Icon" style="width:25px;height:25px;margin-right:30px;">Logout</a>
          </div>
        </li>
          </ul>
        </nav>
    </header>

    <section id="about">
        <header class="section-header">
          <h2 class="second-header-about">ABOUT.</h2>
        </header>
        <div class="container">
          <div class="about-image">
            <img src="../img/aboutus1.jpg" alt="About Image" height="600px">
          </div>
          <div class="about-content">
            <h3 class="about-header"><em><b>About Us</b></em></h3>
            <p class="about-para">
                SweatFactory is a community-centered gym located at Kuala Lumpur. We are dedicated to help individuals achieve personal growth through good exercises, good diets and good habits.
            </p>
            <h3 class="about-header"><em><b>Our Vision</b></em></h3>
            <p class="about-para">
                Empowering individuals to lead healthy and active lifestyles through a community-centered fitness experience
            </p>
            <h3 class="about-header"><em><b>Our Mission</b></em></h3>
            <p class="about-para">
                To provide a welcoming environment that promotes physical fitness, mental wellness, and personal growth.
            </p>
          </div>
        </div>
    </section>

    <section id="contact">
        <header class="section-header">
          <h2 class="second-header-contact">CONTACT.</h2>
        </header>
        <div class="container2">
            <div class="container3">
                <div class="contact-image">
                  <img src="../img/aboutus2.jpg" alt="Contact Image">
                  <div class="overlay">
                    <h3 class="banner"><em>GET IN TOUCH</em></h3>
                </div>
            </div>
            <div class="contact-content">
                <div class="contact-item">
                  <h3 class="contact-header">LOCATION</h3>
                  <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d939.9963033602562!2d101.74147699900202!3d3.2081546103530685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc38379a6f91cb%3A0xbd3cdae8da67b55f!2sXtreme%20Hardcore%20Gym%20%26%20Fitness%20Center!5e0!3m2!1sen!2smy!4v1686999797394!5m2!1sen!2smy" width="235" height="235" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
                </div>
                <div class="contact-item">
                  <h3 class="contact-header">OPERATING HOURS</h3>
                  <p class="contact-para">
                    MONDAYS TO SUNDAYS <br> 03:00AM to 00:00AM
                  </p>
                </div>
                <div class="contact-item">
                  <h3 class="contact-header">CONTACT US</h3>
                  <ul class="social-media">
                    <li><img src="../img/twitter.png" alt="Twitter"><span>@sweatfactory</span></li>
                    <br>
                    <li><img src="../img/facebook.png" alt="Facebook"><span>sweatfactory</span></li>
                    <br>
                    <li><img src="../img/instagram.png" alt="Instagram"><span>@sweatfactorygym</span></li>
                    <br>
                    <li><img src="../img/whatsapp.png" alt="Number"><span>012-3456789</span></li>
                    <br>
                    <li><img src="../img/gmail.png" alt="Email"><span>info@sweatfactory.com</span></li>
                  </ul>
                </div>
            </div>
        </div>
    </section>

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
    <script src="about-us.js"></script>
</body>
</html>
