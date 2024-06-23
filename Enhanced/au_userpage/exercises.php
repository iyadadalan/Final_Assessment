<?php 
session_start();

include("../connection.php");

$query = "select * from users";
$result = mysqli_query($con, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $_SESSION['username'] = $row['username'];
  } else {
    echo "Username not found!";
  }
} else {
  echo "Error: " . mysqli_error($con);
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
    <title>SweatFactory - Exercises</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">
    <link rel="stylesheet" href="exercises.css">
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

    <div class="background-container">
      <div class="headerTitle1">
        <h1 id="workout-plan">WORKOUT PLAN.</h1>
      </div><br><br><br>

      <div class="container">
        <div class="slider active">
          <h2 class="slider-title">Week 1</h2>
          <table class="slider-table">
            <div class="week active">
              <tr>
                <th>Day of Week</th>
                <th>Workout</th>
              </tr>
              <tr>
                <td>Monday</td>
                <td>Chest and Triceps</td>
              </tr>
              <tr>
                <td>Tuesday</td>
                <td>Back and Biceps</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>Rest or Cardio (optional)</td>
              </tr>
              <tr>
                <td>Thursday</td>
                <td>Legs and Shoulders</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>Core and Cardio</td>
              </tr>
              <tr>
                <td>Saturday</td>
                <td>Full Body Workout</td>
              </tr>
              <tr>
                <td>Sunday</td>
                <td>Rest or Yoga (optional)</td>
              </tr>
            </div>
          </table>
        </div>

        <div class="slider">
          <h2 class="slider-title">Week 2</h2>
          <table class="slider-table">
            <div class="week">
              <tr>
                <th>Day of Week</th>
                <th>Workout</th>
              </tr>
              <tr>
                <td>Monday</td>
                <td>Upper Body Strength Training</td>
              </tr>
              <tr>
                <td>Tuesday</td>
                <td>Lower Body Strength Training</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>Cardio: HIIT Workout</td>
              </tr>
              <tr>
                <td>Thursday</td>
                <td>Yoga or Pilates</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>Full Body Strength Training</td>
              </tr>
              <tr>
                <td>Saturday</td>
                <td>Cardio: Cycling or Swimming</td>
              </tr>
              <tr>
                <td>Sunday</td>
                <td>Rest Day</td>
              </tr>
            </div>
          </table>
        </div>

        <div class="slider">
          <h2 class="slider-title">Week 3</h2>
          <table class="slider-table">
            <div class="week">
              <tr>
                <th>Day of Week</th>
                <th>Workout</th>
              </tr>
              <tr>
                <td>Monday</td>
                <td>Chest and Triceps</td>
              </tr>
              <tr>
                <td>Tuesday</td>
                <td>Back and Biceps</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>Cardio: Running or Cycling</td>
              </tr>
              <tr>
                <td>Thursday</td>
                <td>Legs and Shoulders</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>Core Workout and Yoga</td>
              </tr>
              <tr>
                <td>Saturday</td>
                <td>Swimming or Hiking</td>
              </tr>
              <tr>
                <td>Sunday</td>
                <td>Rest Day</td>
              </tr>
            </div>
          </table>
        </div>

        <div class="slider">
          <h2 class="slider-title">Week 4</h2>
          <table class="slider-table">
            <div class="week">
              <tr>
                <th>Day of Week</th>
                <th>Workout</th>
              </tr>
              <tr>
                <td>Monday</td>
                <td>Upper Body</td>
              </tr>
              <tr>
                <td>Tuesday</td>
                <td>Lower Body</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>Cardio</td>
              </tr>
              <tr>
                <td>Thursday</td>
                <td>Full Body Workout</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>Core and Abs</td>
              </tr>
              <tr>
                <td>Saturday</td>
                <td>Rest</td>
              </tr>
              <tr>
                <td>Sunday</td>
                <td>Rest or Yoga (optional)</td>
              </tr>
            </div>
          </table>
        </div>

        <div class="slider-controls">
          <button class="prev-button">&#60;</button>
          <div class="pagination">
            <div id="dot1" class="dot active"></div>
            <div id="dot2" class="dot"></div>
            <div id="dot3" class="dot"></div>
            <div id="dot4" class="dot"></div>
          </div>
          <button class="next-button">&#62;</button>
        </div><br><br><br>
      </div>
    </div>

    <div class="headerTitle2">
      <h1 id="recommendations">EXERCISE RECOMMENDATIONS.</h1>
    </div>
    <div class="video-grid">
      <div class="video">
        <video width="140" height="250" controls>
          <source src="../video/BicepCurl.mp4" type="video/mp4">
        </video>
        <div class="video-info">
          <h3>Bicep Curl</h3><br>
          <p>Bicep curls are a beneficial exercise for building upper body strength, defining and shaping the biceps muscles, and improving grip strength and hand dexterity.</p>
        </div>
      </div>

      <div class="video">
        <video width="140" height="250" controls>
          <source src="../video/TricepsPushdown.mp4" type="video/mp4">
        </video>
        <div class="video-info">
          <h3>Triceps Pushdown</h3><br>
          <p>Triceps pushdown is a strength training exercise that primarily targets the triceps muscles of the upper arms. This exercise helps to increase triceps strength, and size.</p>
        </div>
      </div>

      <div class="video">
        <video width="140" height="250" controls>
          <source src="../video/TricepsPulldown.mp4" type="video/mp4">
        </video>
        <div class="video-info">
          <h3>Triceps Pulldown</h3><br>
          <p>Tricep pulldown is an exercise that targets triceps muscles, located at the back of the upper arms. It help strengthen triceps and contributing to overall arm strength.</p>
        </div>
      </div>

      <div class="video">
        <video width="140" height="250" controls>
          <source src="../video/Yoga.mp4" type="video/mp4">
        </video>
        <div class="video-info">
          <h3>Yoga</h3><br>
          <p>Yoga is a physical, mental, and spiritual practice that involves a combination of breathing exercises, meditation, and various postures or poses, known as asanas.</p>
        </div>
      </div>

      <div class="video">
        <video width="140" height="250" controls>
          <source src="../video/HIIT.mp4" type="video/mp4">
        </video>
        <div class="video-info">
          <h3>HIIT</h3><br>
          <p>HIIT (High-Intensity Interval Training) is a cardiovascular exercise strategy that alternates short periods of intense anaerobic exercise with less intense recovery periods.</p>
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2023 SweatFactory. All rights reserved.</p>
      <p>All images are sourced from Unsplash and Pexels.</p>
      <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank"><img src="../img/facebook.png" alt="Facebook"></a>
        <a href="https://www.twitter.com" target="_blank"><img src="../img/twitter.png" alt="Twitter"></a>
        <a href="https://www.instagram.com" target="_blank"><img src="../img/instagram.png" alt="Instagram"></a>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="exercises.js"></script>

</body>
</html>
