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
    <title>SweatFactory - Lifestyle</title>
    <link rel="icon" type="image/x-icon" href="../img/sf-favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js" integrity="sha256-J8ay84czFazJ9wcTuSDLpPmwpMXOm573OUtZHPQqpEU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="lifestyle.css">
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

  <div class="diet" id="diet">
    <div class="banner">
      <h1 class="sectionHeader">DIET.</h1>
    </div>
    <div class="grid">
      <div class="panel">
        <h2> <span>&#10112;</span> Eat Plenty of Protein</h2>
        <p class="content1">Protein is essential for building and repairing muscles, so it's important to consume enough of it. 
          Good sources of protein include chicken, fish, beef, eggs, dairy, legumes, and nuts.</p>
      </div>
      
      <div class="panel">
        <h2> <span>&#10113;</span> Don't Forget Carbs</h2>
        <p class="content1">Carbohydrates are the body's main source of energy, and they're especially important for 
          people who are active. Focus on eating complex carbs like whole grains, fruits, and vegetables</p>
      </div>
      
      <div class="panel">
        <h2><span>&#10114;</span> Stay Hydrated</h2>
        <p class="content1">Drinking enough water is essential for overall health, 
          and it's especially important when you're working out. Aim to drink at least 8 glasses of water per day.</p>
      </div>
    
      <div class="panel">
        <h2><span>&#10115;</span> Avoid Processed Food</h2>
        <p class="content1">Processed foods are often high in calories, sodium, and unhealthy fats. 
          Instead, focus on whole, nutrient-dense foods that will give your body the fuel it needs.</p>
      </div>

      <div class="panel">
        <h2><span>&#10116;</span> Eat Regularly</h2>
        <p class="content1">Aim to eat three meals and two snacks per day to keep your energy levels up and avoid overeating.</p>
      </div>
    </div>
  </div>
  
  <div class="habits" id="habits">
    <div class="banner">
      <h1 class="sectionHeader">HEALTHY HABITS.</h1>
    </div>
    <div class="accordion-image-wrapper">
      <div class="image-wrapper">
        <img src="../img/healthy-habits.png" alt="healthy-habits">
      </div>
        <ul id="accordion">
          <li>
              <label for="first"><span id="bullet">&#10061;</span> Get Enough Sleep<span id="arrow">&#x3e;</span> </label>
              <input type="radio" name="accordion" id="first">
              <div class="content1">
                  <p>Aim to get at least 7-8 hours of sleep per night to help your body recharge and function properly.</p>
              </div>
          </li>
          <li>
              <label for="second"><span id="bullet">&#10061;</span> Stay Active<span id="arrow">&#x3e;</span></label>
              <input type="radio" name="accordion" id="second">
              <div class="content1">
                  <p>Regular exercise helps improve your physical health and mental wellbeing. 
                    Find an activity that you enjoy and make it a regular part of your routine.</p>
              </div>
          </li>
          <li>
              <label for="third"><span id="bullet">&#10061;</span> Practice Mindfulness<span id="arrow">&#x3e;</span></label>
              <input type="radio" name="accordion" id="third">
              <div class="content1">
                  <p>Take a few moments each day to practice mindfulness through meditation, deep breathing, or yoga. 
                    This can help reduce stress and improve your mental health.</p>
              </div>
          </li>
          <li>
              <label for="fourth"><span id="bullet">&#10061;</span> Manage Stress<span id="arrow">&#x3e;</span></label>
              <input type="radio" name="accordion" id="fourth">
              <div class="content1">
                  <p>Find healthy ways to manage stress, such as exercise, meditation, or spending time with loved ones.</p>
              </div>
          </li>
          <li>
              <label for="fifth"><span id="bullet">&#10061;</span> Practice Good Hygiene<span id="arrow">&#x3e;</span></label>
              <input type="radio" name="accordion" id="fifth">
              <div class="content1">
                  <p>Wash your hands regularly, cover your mouth when coughing or sneezing, 
                    and keep your living spaces clean to prevent the spread of germs.</p>
              </div>
          </li>
          <li>
              <label for="sixth"><span id="bullet">&#10061;</span> Limit Screen Time<span id="arrow">&#x3e;</span></label>
              <input type="radio" name="accordion" id="sixth">
              <div class="content1">
                  <p> Reduce the time spent in front of screens, including smartphones, computers, and televisions. 
                    Take regular breaks and engage in activities that don't involve screens, such as reading, outdoor activities, 
                    or exercising at our gym!</p>
              </div>
          </li>
      </ul>
    </div>
  </div>

  <div id="bmi">
    <div class="banner">
        <h1 class="sectionHeader">BMI CALCULATOR.</h1>
    </div>
    <div class="bigbox">
      <div class="container">
        <div class="box">
          <div class="content">
            <div class="input">
                <label for="age">AGE</label>
                <input type="text" class="text-input" id="age" autocomplete="off" required/>
            </div>

            <div class="gender">
                <label class="container">
                  <input type="radio" name="radio" id="m"><p class="text">MALE</p>
                  <span class="checkmark"></span>
                </label>

                <label class="container">
                  <input type="radio" name="radio" id="f" ><p class="text">FEMALE</p>
                  <span class="checkmark"></span>
                </label>
            </div>

            <div class="containerHW">
            <div class="inputH">
              <label for="height">HEIGHT (cm)</label>
              <input type="number" id="height" required>
            </div>

            <div class="inputW">
              <label for="weight">WEIGHT (kg)</label>
              <input type="number" id="weight" required>
            </div>
          </div>

          <button class="calculate" id="submit" >CALCULATE BMI</button>
          
          </div>
          <div class="result">
            <p>Your BMI is</p>
            <div id="result">00.00</div>
            <p class="comment"></p>
          </div>

        </div>
      </div>
    </div>
    <div id="dialog" title="ALERT!" style="display: none;">
      <p>Please fill in all the required details for BMI calculation.</p>
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
  <script src="lifestyle.js"></script>
</body>
</html>
