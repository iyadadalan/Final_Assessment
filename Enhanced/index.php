<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweatFactory - Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">


    <style>

        body {
          margin: 0;
          padding: 0;
          font-family: Arial, sans-serif;
          background-color: #141414;
        }

        p, h1, h2 {
          cursor: default;
        }

        header {
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
  
  
      .container1 {
        position: relative;
        width: 100%;
      }
  
      .background-image {
        width: 100%;
        overflow: hidden;
      }
    
      .background-image img {
        width: 100%;
        height: auto;
      }
  
      .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
      }
  
      .overlay h1 {
        font-family: 'Anton', sans-serif;
        font-size: 100px;
        margin-bottom: 1rem;
      }
  
      .button {
        width: 150px;
        height: 50px;
        background-color: #F9EF23;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000;
        font-size: 1.2rem;
        text-decoration: none;
        font-family: 'Anton', Arial, sans-serif;
        letter-spacing: 3px;
      }
  
      .button:hover {
        background-color: black;
        transform: scale(1.05);
        border: solid 1px yellow;
        color: #F9EF23;
      }
  
      .container2{
          display: flex;
      }
  
      .left-section {
      width: 40%;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 50px;
      }
  
      .left-section h2 {
        color: #F9EF23;
        font-family: 'Anton', sans-serif;
        font-size: 70px;
      }
  
      .left-section p {
        color: #fff;
        text-align: left;
        font-size: 20px;
        font-family: 'Tenor Sans', sans-serif;
      }
  
      .left-section a {
        color: #f9ef23;
        text-decoration: underline;
      }

      .left-section a:hover {
        text-decoration: none;
      }
  
      .right-section {
        width: 60%;
        padding: 20px;
        display: flex;
        justify-content: flex-start;
      }
  
      .right-section img {
        width: 45%;
        margin-right: 5%;
      }
  
      .lifestyle-homepage {
              text-align: center;
              background-color: #141414;
              padding: 0;
              margin: 0;
          }
      
          .lifestyle-homepage h1, .exercises-homepage h1 {
              font-family: 'Anton', sans-serif;
              font-size: 51px;
              color: #F9EF23;
              letter-spacing: 2px;
          }
      
          .lifestyle-homepage p, .exercises-homepage p {
              font-family: 'Tenor sans', sans-serif;
              font-size: 23px;
              color: white;
              background-color: none;
          }
      
          .img-container {
              display: flex;
              justify-content: center;
              flex-wrap: wrap;
          }
      
          .img-container .image-container {
              flex: 0 0 calc(50% - 20px);
              position: relative;
              margin: 10px;
              max-width: 400px;
              overflow: hidden;
          }
      
          .img-container .image-container img {
              width: 360px;
              height: 390px;
              max-width: 100%;
              max-height: 100%;
              transition: transform 0.3s ease, filter 0.3s ease;
          }
      
          .img-container .image-container:hover img {
              transform: scale(1.1);
              filter: saturate(180%);
          }
      
          .img-container .image-container p {
              position: absolute;
              top: 40%;
              left: 50%;
              transform: translate(-50%, -50%);
              width: 100%;
              color: white;
              text-decoration: none;
              opacity: 1;
              transition: opacity 0.3s ease;
              font-size: 28px;
          }
      
          .img-container .image-container:hover p {
              opacity: 1;
          }
      
          .img-container .image-container p:hover {
              text-decoration: underline;
              font-size: 32px;
              transition: font-size 0.3s ease;
              cursor: pointer;
          }
      
          .image-container p {
              font-size: 28px;
              font-family: 'Anton', sans-serif;
              font-style: italic;
          }
  
          .exercises-homepage {
          text-align: center;
          background-color: #141414;
          padding: 0;
          margin: 0;
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

      <div class="container1">
        <div class="background-image">
        <img src="img\homepage.png" alt="Homepage Image">
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
        <img src="img\home1.png" alt="Image 1" style="margin-bottom: 30%">
        <img src="img\home2.jpg" alt="Image 2" style="margin-top: 30%">
      </div>
    </div>

    <div class="lifestyle-homepage">
        
      <br><br><h1>LIFESTYLE</h1>
      <P>Improve your life with these simple tips.</P><br>

    <div class="img-container">

      <div class="image-container">
        <a href="lifestyle.php#diet">
        <img src="img/diet.png" alt="diet" width="380" height="380">
        <p>DIET</p></a>
      </div>

      <div class="image-container">
          <a href="lifestyle.php#habits">
          <img src="img/habits.png" alt="habits" width="380" height="380">
          <p>HEALTHY HABITS</p></a><br><br><br><br><br><br>
        </div>
  
      <div class="image-container">
        <a href="lifestyle.php#bmi">
        <img src="img/bmi.png" alt="bmi" width="380" height="380">
        <p>BMI<br>CALCULATOR</p></a><br><br><br><br><br><br>
      </div>
      
    </div>
  </div>

  <div class="exercises-homepage">

    <br><br><h1 id="exercises.php">EXERCISES</h1>
    <P>Our top priority is ensuring that you have the ultimate workout experience.</P><br>

  <div class="img-container">

    <div class="image-container">
      <a href="exercises.php#workout-plan">
      <img src="img/Exercise.png" alt="exercise" width="380" height="380">
      <p>WORKOUT PLAN</p></a>
    </div>

    <div class="image-container">
      <a href="exercises.php#recommendations">
      <img src="img/threadmill.png" alt="recommendations" width="380" height="380">
      <p>EXERCISE RECOMMENDATIONS</p></a><br><br><br><br><br><br>
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