<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweatFactory - Lifestyle</title>
    <link rel="icon" type="image/x-icon" href="img/sf-favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=League+Gothic&family=Tenor+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <style>
        *{
          box-sizing: border-box;
        }
        body {
          margin: 0;
          padding: 0;
          font-family: Arial, sans-serif;
          background-color: #141414;
          color: #ffffff;
        }

        p,h1, h2, h3, h4, h5, h6 {
          cursor: default;
        }

        header {
          background-color: #F9EF23;
          color: black;
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: -32px;
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
        .image-wrapper img {
          width: 720px; /* Adjust the width of the image */
          padding-left: 80px;
        }
        .banner {
            background-color: #171103;
            color: #ffffff;
            font-family: 'League Gothic', sans-serif;
            letter-spacing: 1.5px;
            padding: 0;
            margin: 0px;
        }
        .sectionHeader {
            padding: 10px;
            margin-left: 20px;
            font-size: 49px;
            color: #ffffff;
        }
        #accordion{
          margin: 100px auto;
          width: 400px;
          padding-right: 100px;
          flex: 1;
        }
        #accordion li{
          list-style: none;
          width: 100%;
          margin-bottom: 10px;
          background: #181717;
          padding: 10px;
          border-radius: 4px;
        }
        #accordion label{
          padding: 5px;
          display: flex;
          justify-content: space-between;
          letter-spacing: 1.0px;
          font-weight: 500;
          font-size: 27px;
          cursor: pointer;
          color: whitesmoke;
          font-family: 'Anton', sans-serif;
        
        }

        #accordion label #arrow{
          transform: rotate(90deg);
          font-size: 22px;
          color: #c5c5c5;
        }
        #accordion label + input[type="radio"]{
          display: none;
        }
        .content1{
          color: white;
          font-family: 'Tenor Sans', sans-serif;
        }
        #accordion .content1{
          padding: 0 10px;
          line-height: 26px;
          max-height: 0;
          overflow: hidden;
          transition: max-height 0.5s;
          font-size: 20px;
        }
        #accordion label + input[type="radio"]:checked + .content1{
          max-height:400px;
        }
        .accordion-image-wrapper {
          display: flex;
          align-items: flex-start;
        }
        .diet{
          background-image: url("img/diet-bg.png");
          background-size: cover;
          background-repeat: no-repeat;
          margin-bottom: -38px;
        }
        .image-wrapper {
          flex: 1;
          margin-right: 20px;
        }
        .habits{
          margin-bottom: -37px;
        }
        .grid {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          grid-gap: -100px;
        }

        .panel{
          border: none;
          padding: 23px;
          text-align: right;

        }
        .panel h2{
          font-family: 'Anton', sans-serif;
          font-size: 36px;
          color: white;
          text-align: left;
          letter-spacing: 0.5px;
        }
        .panel .content1{
          font-size: 22px;
          text-align: justify;
          width: 380px;
        }
        .panel span
        {
          color: #e7dc44;
          font-size: larger;
        }
        #bullet{
          color: #e7dc44;
        }
        .ui-widget{
          background-color: #1B1C1F;
          border: none;
          position: absolute;
        }
        .ui-widget-header{
          color: #e7dc44;
          background-color: #141414;
          border: none;
          font-family: 'Anton', sans-serif;
          letter-spacing: 2px;
        }
        .ui-widget-content{
          color: rgb(255, 84, 84);
          border: none;
          font-family: 'Tenor Sans', sans-serif;
        }
        .ui-dialog {
          position: absolute;
          top: 0;
          left: 0;
          padding: .2em;
          outline: 0;
          }
        .ui-dialog .ui-dialog-titlebar-close:hover {
          background-color: grey;
        }
        .box {
          width: 500px;
          background: #0B0B02;
          border-radius: 12px;
          text-align: center;
          box-shadow: 2px 2px 20px 5px rgba(0,0,0,0.5);
        }

        .bigbox {
          display: flex;
          align-items: center;
          justify-content: center;
          padding-bottom: 40px;
        }
            
        .content {
            padding: 30px;
            font-family: 'Anton', 'sans-serif';
        }

        .input {
            background: #181717;
            border-radius: 12px;
            padding: 20px 0;
            margin-bottom: 20px;
            
        }
        .input label {
            display: block;
            font-size: 30px;
            color: #F9EF23;
            margin-bottom: 20px;
        }
        .input input {
            outline: none;
            border: none;
            border-bottom: 2px solid #F9EF23;
            width: 50%;
            text-align: center;
            font-size: 28px;
            font-family: "Nunito", sans-serif;
            background-color: #181717;
            color: white;
            font-family: 'Anton', 'sans-serif';
        }

        .containerHW {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .inputW {
            background: #181717;
            border-radius: 12px;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .inputW label {
            display: block;
            font-size: 20px;
            color: #F9EF23;
            margin-bottom: 20px;
        }
        .inputW input {
            outline: none;
            border: none;
            border-bottom: 2px solid #e7dc44;
            width: 50%;
            text-align: center;
            font-size: 28px;
            background-color: #181717;
            color: white;
            font-family: 'Anton', 'sans-serif';
        }

        .inputH {
            background: #181717;
            border-radius: 12px;
            padding: 10px 0;
            margin-bottom: 20px;
            margin-right: 20px;
        }
        .inputH label {
            display: block;
            font-size: 20px;
            color: #e7dc44;
            margin-bottom: 20px;
        }
        .inputH input {
            outline: none;
            border: none;
            border-bottom: 2px solid #F9EF23;
            width: 50%;
            text-align: center;
            font-size: 28px;
            background-color: #181717;
            color: white;
            font-family: 'Anton', 'sans-serif';
        }

        button.calculate {
            cursor: pointer;
            font-family: 'Anton', 'sans-serif';
            color: black;
            background: #F9EF23;
            font-size: 29px;
            border-radius: 7px;
            padding: 12px 0;
            width: 100%;
            outline: none;
            border: none;
            transition: all 0.5s;
            margin-bottom: -20px;
          }
        button.calculate:hover {
            background: #846A00;
        }
        button.calculate:active {
            background-color: #5f4c03;
        }
        
        .result {
            padding: 10px 20px;
        }
        .result p {
            font-weight: 600;
            font-size: 22px;
            color: white;
            margin-bottom: 15px;
            font-family:'Tenor Sans', sans-serif;
        }
        .result #result {
            font-size: 36px;
            font-weight: 900;
            color: #F9EF23;
            background-color: #181717;
            display: inline-block;
            padding: 0px 20px;
            border-radius: 55px;
            margin-bottom: -10px;
            font-family: 'Anton', 'sans-serif';
            }
        #comment {
            color: #F9EF23;
            font-weight: 800;
        }

        .comment {
            display: none;
            border-radius: 7px;
            padding: 5px;
        }

        .gender {
            display: flex;
            justify-content: space-around;
            align-items: center;
            align-content: center;
            background: #181717;
            border-radius: 12px;
            padding: 20px 0;
            margin-bottom: 20px;
            color: #F9EF23;
        }

        /* Style for Radio */
        .gender .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-top: 7px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
          }
          
        /* Hide the browser's default radio button */
        .gender .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }
          
        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }
          
        /* On mouse-over, add a grey background color */
        .gender .container:hover input ~ .checkmark {
            background-color: #b5b5b5;
        }
          
        /* When the radio button is checked, add a blue background */
        .gender .container input:checked ~ .checkmark {
            background-color: #ccc;
        }
          
        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
          
        /* Show the indicator (dot/circle) when checked */
        .gender .container input:checked ~ .checkmark:after {
            display: block;
        }
          
        /* Style the indicator (dot/circle) */
        .gender .container .checkmark:after {
              top: 9px;
              left: 9px;
              width: 8px;
              height: 8px;
              border-radius: 50%;
              background: #000000;
        }
        /* END Style for Radio */
        
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
        <img src="img/healthy-habits.png" alt="healthy-habits">
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
      <a href="https://twitter.com/home"><img src="img/twitter-black.png" alt="twitter-icon" width="30px" height="30px"></a>
      <a href="https://www.facebook.com"><img src="img/facebook-black.png" alt="facebook-icon" width="30px" height="30px"></a>
      <a href="https://www.instagram.com"><img src="img/instagram-black.png" alt="instagram-icon" width="30px" height="30px"></a>
      <a href="https://mail.google.com"><img src="img/gmail-black.png" alt="gmail-icon" width="30px" height="30px"></a>
      <a href="https://wa.me/+60123456789"><img src="img/whatsapp-black.png" alt="whatsapp-icon" width="30px" height="30px"></a>
    </div>
  </footer>

  <script>
    var btn = document.getElementById("submit");
    var age = document.getElementById("age");
    var height = document.getElementById("height");
    var weight = document.getElementById("weight");
    var male = document.getElementById("m");
    var female = document.getElementById("f");
    var form = document.getElementById("form");
    let resultArea = document.querySelector(".comment");

    function calculate(){
    
      if(age.value=='' || height.value=='' || weight.value=='' || (male.checked==false && female.checked==false)){
        //alert("Please fill in all the required details for BMI calculation");
        $( function() {
            $( "#dialog" ).dialog();
            document.body.classList.add("overlay");
        } );
        
      }else{
        countBmi();
      }
    }

    function countBmi(){
      var p = [age.value, height.value, weight.value];
      if(male.checked){
        p.push("male");
      }else if(female.checked){
        p.push("female");
      }

      var bmi = Number(p[2])/(Number(p[1])/100*Number(p[1])/100);
          
      var result = '';
      if(bmi<18.5){
        result = 'Underweight';
        }else if(18.5<=bmi&&bmi<=24.99){
        result = 'Healthy';
        }else if(25<=bmi&&bmi<=29.99){
        result = 'Overweight';
        }else if(30<=bmi&&bmi<=34.99){
        result = 'Obese';
        }else if(35<=bmi){
        result = 'Extremely obese';
      }

      // Display the result area and set the result text and calculated BMI value
      resultArea.style.display = "block";
      document.querySelector(".comment").innerHTML = `You are <span id="comment">${result}</span>`;
      document.querySelector("#result").innerHTML = bmi.toFixed(2);
    }

    btn.addEventListener("click", calculate);
  </script>
</body>
</html>