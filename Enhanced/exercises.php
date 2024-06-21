<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweatFactory - Exercises</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&family=Poppins&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">

    <style>
      
body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #141414;
}

p,h1, h2, h3, h4, h5, h6 {
  cursor: default;
}

header {
  padding-top: 20.5px;
  padding-bottom: 20.5px;
  background-color: #F9EF23;
  color: black;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo a{
  text-decoration: none;
  color: black;
}

.logo {

  font-size: 18px;
  font-weight: bold;
  display: flex;
  align-items: center;
  font-family: 'Anton', sans-serif;
  font-style: italic;
  letter-spacing: 5px;
  margin-left: 20px;
}

.logo img {
  width: 20%;
  height: 20%; /* Adjust the height of the logo image */
  margin-right: 10px; /* Add some spacing between the logo image and text */
}

.logo h1{
  color: black;
}

nav ul {
  list-style-type: none;
  margin-right: 50px;
  padding-left: 5px;
  display: flex;
}

nav ul li {
  margin-left: 40px;
  text-align: right;
  font-family: 'Anton', sans-serif;
  font-size: 20px;
}

nav ul li a {
  color: #1B1C1F;
  text-decoration: none;
  transition: color 0.3s ease; 
}

nav ul li a:hover {
  color: #846A00; /* Change color on hover */
}

nav ul li a:active {
  color: #5f4c03; /* Change color when clicked */
}


.background-container {
  background-image: url('img/TableGymBg.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  width: 100%;
  height: 100%;
}


.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  color: #F9EF23;
  text-align: center;
}

table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
  border-radius: 8px;
  overflow: hidden;
  background-color: #000;
  color: #FFF;
}

.slider-table th { 
  background-color: #F9EF23;
  color: black;
}

.slider-table td {
  padding: 10px;
  text-align: center;
  border: 1px solid grey;
  font-family: 'Tenor Sans',sans-serif;
}

.slider-title {
  font-family: 'Tenor Sans', sans-serif;
  font-size: 28px;
  font-weight: bold;
  color: white;
  text-align: center;
  margin-bottom: 10px;
  text-transform: uppercase;
}

.slider-title::after {
  content: "";
  display: block;
  width: 60px;
  height: 2px;
  background-color:#c3c9d4;
  margin: 0 auto;
  margin-top: 10px;
}

.headerTitle1 h1 , .headerTitle2 h1 {
  font-family: 'League Gothic', sans-serif;
  color: white;
  padding: 20px;
  text-align: left;
  background-color: #171103;
  font-size: 49px;

} 

h1 {
  margin: 0;
}

.video-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr); 
  grid-gap: 20px;
  padding: 20px;
}

.video {

  padding: 20px;
  position: relative; /* This line is to make the position of the video container relative */
}

.video-info {
  font-family: 'Tenor Sans',sans-serif;
  position: absolute;
  top: 61%; /* Adjust this value to vertically center the yellow box */
  left: 62%; /* Adjust this value to horizontally center the yellow box */
  transform: translate(-50%, -50%); /* This line is to center the yellow box both vertically and horizontally */
  background-color: #F9EF23;
  padding: 10px;
  color: #000;
  width: 250px;
  height: 160px;
}

.video-info h3{
  font-family: 'Anton', sans-serif;
  font-style: italic;
}

.video-info p{
  font-family: 'Tenor Sans', sans-serif;
}

.video h3 {
  margin-top: 0;
  margin-bottom: 5px;
}

.video p {
  margin-top: 0;
}


.slider {
  display: none;
}

.slider-table {
  width: 600px;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.slider-table th,
.slider-table td {
  padding: 8px;
  text-align: center;
  border-bottom: 1px solid grey;
}

.slider.active {
  display: block;
}

.slider-controls {
  display: flex;
  align-items: center; /* Align items vertically */
  justify-content: center; /* Center items horizontally */
  margin-top: 10px;
}

.pagination {
  text-align: center;
  margin: 0 10px; /* Add some margin between dots and buttons */
}

.dot {
  display: inline-block;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: grey;
  margin: 0 5px;
  cursor: pointer;
}

.dot.active {
  background-color: white;
}

.prev-button,
.next-button {
  background: none;
  border: none;
  color: white;
  font-weight: bold;
  font-style: normal;
  text-shadow: #141414;
  font-size: 40px;
  cursor: pointer;
  margin: 10px;
  border-radius: 10px;
  font-family: 'Poppins', sans-serif;
  text-shadow: 2px 2px 4px black;
}

.prev-button:hover,
.next-button:hover {
  background: none;
}



.week {
  display: none;
}

.week.active {
  display: table;
}

        footer {
            background-color: #1B1C1F;
            color: #FFFFFF;
            padding: 20px;
            text-align: center;
            font-family: 'Tenor Sans', sans-serif;
            
        }

        footer ul {
            list-style-type: none;
            padding: 0;
            margin: 10px 0;
            display: flex;
            justify-content: center;
            font-family: 'League Gothic', sans-serif;
            font-size: 24px;
        }

        footer ul li {
            margin: 0 10px;
        }

        footer ul li a {
            color: #FFFFFF;
            text-decoration: none;
            letter-spacing: 1px;
            transition: color 0.5s ease;
        }

        footer hr {
            border: none;
            border-top: 1px solid #FFFFFF;
            margin: 20px 0;
        }

        footer .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            transition: transform 0.3s ease;
        }

        footer .social-icons a {
            display: inline-block;
            margin: 0 10px;
            color: #FFFFFF;
        }
        
        footer ul li a:hover {
          color: #F9EF23;
        }

        footer .social-icons img:hover {
          transform: scale(1.03);
        }

    </style>
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
            <source src="video/BicepCurl.mp4" type="video/mp4">
          </video>
          <div class="video-info">
          <h3>Bicep Curl</h3><br>
          <p>Bicep curls are a beneficial exercise for building upper body strength, defining and shaping the biceps muscles, and improving grip strength and hand dexterity.</p>
          </div>
        </div>

        <div class="video">
          <video width="140" height="250" controls>
            <source src="video/TricepsPushdown.mp4" type="video/mp4">
          </video>
          <div class="video-info">
          <h3>Triceps Pushdown</h3><br>
          <p>Triceps pushdown is a strength training exercise that primarily targets the triceps muscles of the upper arms. This exercise helps to increase triceps strength, and size.</p>
          </div>
        </div>
        
        <div class="video">
          <video width="140" height="250" controls>
            <source src="video/TricepsPulldown.mp4" type="video/mp4">
          </video>
          <div class="video-info">
          <h3>Triceps Pulldown</h3><br>
          <p>
            Tricep pulldown is an exercise that targets triceps muscles, located at the back of the upper arms. It help strengthen triceps and contributing to overall arm strength.</p>
          </div>
        </div>

        <div class="video">
          <video width="140" height="250" controls>
            <source src="video/Yoga.mp4" type="video/mp4">
          </video>
          <div class="video-info">
          <h3>Yoga</h3><br>
          <p>Yoga is a physical, mental, and spiritual practice that involves a combination of postures, breathing, and meditation, which has many benefits for both physical and mental health.</p>
          </div>
        </div>

        <div class="video">
          <video width="140" height="250" controls>
            <source src="video/Threadmills.mp4" type="video/mp4">
          </video>
          <div class="video-info">
          <h3>Treadmills</h3><br>
          <p>Treadmills offer a convenient and effective way to improve cardiovascular health, burn calories, and manage weight in a low-impact and in customizable way.</p>
          </div>
        </div>

        <div class="video">
          <video width="140" height="250" controls>
            <source src="video/ShoulderPull.mp4" type="video/mp4">
          </video>
          <div class="video-info">
          <h3>Shoulder Pull</h3><br>
          <p>Shoulder pull is an extremely effective exercise that targets the upper back muscles, rhomboids and rear deltoids, helping improve posture and upper body strength. </p>
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
          <a href="https://twitter.com/home"><img src="img/twitter-black.png" alt="twitter-icon" width="30px" height="30px"></a>
          <a href="https://www.facebook.com"><img src="img/facebook-black.png" alt="facebook-icon" width="30px" height="30px"></a>
          <a href="https://www.instagram.com"><img src="img/instagram-black.png" alt="instagram-icon" width="30px" height="30px"></a>
          <a href="https://mail.google.com"><img src="img/gmail-black.png" alt="gmail-icon" width="30px" height="30px"></a>
          <a href="https://wa.me/+60123456789"><img src="img/whatsapp-black.png" alt="whatsapp-icon" width="30px" height="30px"></a>
        </div>
      </footer>
</body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Get the slider elements
const sliders = document.querySelectorAll('.slider');
    // Get the pagination dots
    const dots = document.querySelectorAll('.dot');
    // Get the previous and next buttons
    const prevButton = document.querySelector('.prev-button');
    const nextButton = document.querySelector('.next-button');
    // Set the initial active slide index
    let activeSlideIndex = 0;

    // Function to show the current slide
    function showSlide(index) {
      // Hide all slides
      sliders.forEach(slider => {
        slider.classList.remove('active');
      });
      // Remove active class from all dots
      dots.forEach(dot => {
        dot.classList.remove('active');
      });

      // Show the current slide
      sliders[index].classList.add('active');
      // Set the current dot as active
      dots[index].classList.add('active');
      // Update the active slide index
      activeSlideIndex = index;
    }

    // Event listener for previous button click
    prevButton.addEventListener('click', () => {
      activeSlideIndex--;
      if (activeSlideIndex < 0) {
        activeSlideIndex = sliders.length - 1;
      }
      showSlide(activeSlideIndex);
    });

    // Event listener for next button click
    nextButton.addEventListener('click', () => {
      activeSlideIndex++;
      if (activeSlideIndex >= sliders.length) {
        activeSlideIndex = 0;
      }
      showSlide(activeSlideIndex);
    });

    // Event listener for dot click
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        showSlide(index);
      });
    });

    // Show the initial slide
    showSlide(activeSlideIndex);

</script>