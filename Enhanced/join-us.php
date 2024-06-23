<?php
include 'security_utils.php';

$error_message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check CSRF token
    if (!verify_csrf_token($_POST['csrf_token'])) {
        $error_message = "CSRF token validation failed.";
    } else {
        // Sanitize and validate inputs
        $fullName = sanitize_input($_POST['fullName']);
        $email = filter_var(sanitize_input($_POST['email']), FILTER_VALIDATE_EMAIL);
        $phone = sanitize_input($_POST['phone']); // Assume phone validation if needed

        if (!$email) {
            $error_message = "Invalid email format.";
        } elseif (empty($fullName) || empty($phone)) {
            $error_message = "Please fill in all required fields.";
        } else {
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
  <title>SweatFactory - Join Us</title>
  <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">
  <!--<link rel="stylesheet" href="join-us.css">-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="join-us.css">
</head>
<body>
  <header>
    <div class="logo">
      <h1><a href="index.php">SWEATFACTORY.</a></h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="lifestyle.php">LIFESTYLE</a></li>
        <li><a href="exercises.php">EXERCISES</a></li>
        <li><a href="join-us.php">JOIN US</a></li>
        <li><a href="about-us.php">ABOUT US</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="register.php">REGISTER</a></li>
      </ul>
    </nav>
  </header>

  <div class="first-section">
    <div class="first-div">
      <br><br>
      <h6>A SNEAK PEAK <br>OF OUR GYM.</h6>
      <p>Take a Look at Our State-of-the-Art<br>Facilities and Get a Glimpse of Your<br>Possible New Lifestyle</p>
      <button id="join-button">JOIN US TODAY</button>
    </div>
    <div class="second-div" id="slider-container">
      <div class="slider active">
        <img src="https://images.pexels.com/photos/7031706/pexels-photo-7031706.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="image1">
        <div class="description">
          <h6>CARDIO EXERCISE AREA</h6>
          <p>Equipped with treadmills, ellipticals, stationary<br>bikes, and other equipment for aerobic exercise.</p>
        </div>
        <div class="slider-controls">
            <button class="prev-button">&#60;</button>
            <button class="next-button">&#62;</button>
          </div>
      </div>
      <div class="slider">
        <img src="https://images.pexels.com/photos/4162451/pexels-photo-4162451.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="image2">
        <div class="description">
          <h6>WEIGHTLIFTING AREA</h6>
          <p>Includes weights such as dumbbells, barbells, <br>weight plates, and weightlifting benches.</p>
        </div>
        <div class="slider-controls">
            <button class="prev-button">&#60;</button>
            <button class="next-button">&#62;</button>
          </div>
      </div>
      <div class="slider">
        <img src="https://cdn.pixabay.com/photo/2016/12/25/22/49/workout-1931107_1280.jpg" alt="image3">
        <div class="description">
          <h6>STRETCHING AND FLEXIBILITY AREA</h6>
          <p>A space for stretching exercises and flexibility training. Equipped with mats,<br> foam rollers, yoga props, and other equipment to support stretching routines.</p>
        </div>        <div class="slider-controls">
            <button class="prev-button">&#60;</button>
            <button class="next-button">&#62;</button>
          </div>
      </div>
      <div class="slider">
        <img src="https://images.pexels.com/photos/4162589/pexels-photo-4162589.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="image4">
        <div class="description">
          <h6>LOCKER ROOMS AND SHOWERS</h6>
          <p>Separate locker rooms for men and women. Include lockers to <br>store personal belongings, changing areas, and showers.</p>
        </div>        <div class="slider-controls">
            <button class="prev-button">&#60;</button>
            <button class="next-button">&#62;</button>
          </div>
      </div>
      <div class="slider">
        <img src="https://images.pexels.com/photos/8092430/pexels-photo-8092430.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="image5">
        <div class="description">
          <h6>SAUNA / STEAM ROOM</h6>
          <p>Indulge yourself in the sauna or steam room to <br>revitalize your body and soul after a long workout.</p>
        </div>        <div class="slider-controls">
            <button class="prev-button">&#60;</button>
            <button class="next-button">&#62;</button>
          </div>
      </div>
      <div class="pagination">
        <button class="pagination-button active" id="pg1"></button>
        <button class="pagination-button" id="pg2"></button>
        <button class="pagination-button" id="pg3"></button>
        <button class="pagination-button" id="pg4"></button>
        <button class="pagination-button" id="pg5"></button>
      </div>
    </div>
  </div>

  <div class="second-section" id="image-background">
    <h6>BE A MEMBER NOW</h6>
    <p>Discover the perfect fitness plan for you from our<br>comprehensive selection of personalized packages.</p>
    <div class="package">
      <img src="img/package-img.png" alt="packages">
    </div>
    <div class="getStarted">
      <button id="button1">GET STARTED</button>
      <button id="button2">GET STARTED</button>
      <button id="button3">GET STARTED</button>
    </div>
  </div>

  <div class="third-section">
    <div class="form">
      <h6>REGISTRATION</h6>
      <p>Complete the form below, and our team of experts will<br>contact you soon</p>
      <?php if (!empty($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
      <?php endif; ?>
  
      <form id="myForm" action="https://formspree.io/f/xdknngdj" method="post"> <!--https://formspree.io/f/xdknngdj/submissions-->
        <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
        <div class="form-group">
          <label for="fullName">FULL NAME</label>
          <input type="text" id="fullName" name="fullName" placeholder="FULL NAME" required>
        </div>
  
        <div class="form-group">
          <label for="email">EMAIL</label>
          <input type="email" id="email" name="email" placeholder="EMAIL" required>
        </div>
  
        <div class="form-group">
          <label for="phone">PHONE NUMBER</label>
          <input type="tel" id="phone" name="phone" placeholder="PHONE NUMBER" required>
        </div>
  
        <div class="form-group">
          <label for="package">CHOOSE PACKAGE</label>
          <select id="package" name="package" required>
            <option class="placeholder" value="">CHOOSE PACKAGE</option>
            <option value="starter">Starter</option>
            <option value="basic">Basic</option>
            <option value="premium">Premium</option>
          </select>
        </div>
  
        <div class="form-group">
          <input type="submit" value="SUBMIT">
        </div>
      </form>
    </div>
    
    <div class="deco"></div>
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
      <a href="https://twitter.com/home"><img src="img/twitter-black.png" alt="twitter-icon" width="30px" height="30px"></a>
      <a href="https://www.facebook.com"><img src="img/facebook-black.png" alt="facebook-icon" width="30px" height="30px"></a>
      <a href="https://www.instagram.com"><img src="img/instagram-black.png" alt="instagram-icon" width="30px" height="30px"></a>
      <a href="https://mail.google.com"><img src="img/gmail-black.png" alt="gmail-icon" width="30px" height="30px"></a>
      <a href="https://wa.me/+60123456789"><img src="img/whatsapp-black.png" alt="whatsapp-icon" width="30px" height="30px"></a>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="join-us.js"></script>
</body>
</html>
