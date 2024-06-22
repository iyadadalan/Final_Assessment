   $(document).ready(function() {
      // Image slider 
      var currentSlide = 0;
      var sliderItems = $('.slider');
      var paginationButtons = $('.pagination-button');

      function showSlide(index) {
        sliderItems.removeClass('active');
        $(sliderItems[index]).addClass('active');
        paginationButtons.removeClass('active');
        $(paginationButtons[index]).addClass('active');
      }

      function updateSlider() {
        showSlide(currentSlide);
      }

      $('.next-button').click(function() {
        currentSlide++;
        if (currentSlide >= sliderItems.length) {
          currentSlide = 0;
        }
        updateSlider();
      });

      $('.prev-button').click(function() {
        currentSlide--;
        if (currentSlide < 0) {
          currentSlide = sliderItems.length - 1;
        }
        updateSlider();
      });

      $('.pagination-button').click(function() {
        currentSlide = $(this).index();
        updateSlider();
      });

      // Autofill package
      $('#button1').click(function() {
        $('#package').val('starter');
        var element = document.getElementById('myForm');
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });

      $('#button2').click(function() {
        $('#package').val('basic');
        var element = document.getElementById('myForm');
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });

      $('#button3').click(function() {
        $('#package').val('premium');
        var element = document.getElementById('myForm');
        element.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });

    // Scroll down
    document.getElementById('join-button').addEventListener('click', function() {
    var element = document.getElementById('image-background');
    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });

    document.addEventListener("DOMContentLoaded", function() {
      // Get all the necessary elements
      const sliders = document.querySelectorAll(".slider");
      const paginationButtons = document.querySelectorAll(".pagination-button");
      let currentSlide = 0;

      // Function to show the specified slide
      function showSlide(slideIndex) {
        // Hide all slides and remove active class from pagination buttons
        sliders.forEach(function(slider) {
          slider.classList.remove("active");
        });
        paginationButtons.forEach(function(button) {
          button.classList.remove("active");
        });

        // Show the specified slide and add active class to its pagination button
        sliders[slideIndex].classList.add("active");
        paginationButtons[slideIndex].classList.add("active");
      }

      // Function to handle the automatic sliding
      function autoSlide() {
        // Increment the current slide index
        currentSlide++;

        // Reset the current slide index if it exceeds the number of slides
        if (currentSlide >= sliders.length) {
          currentSlide = 0;
        }

        // Show the next slide
        showSlide(currentSlide);
      }

      // Automatically slide every 4 seconds
      setInterval(autoSlide, 4000);

      // Event listeners for previous and next buttons
      const prevButton = document.querySelector(".prev-button");
      const nextButton = document.querySelector(".next-button");

      prevButton.addEventListener("click", function() {
        currentSlide--;

        if (currentSlide < 0) {
          currentSlide = sliders.length - 1;
        }

        showSlide(currentSlide);
      });

      nextButton.addEventListener("click", function() {
        currentSlide++;

        if (currentSlide >= sliders.length) {
          currentSlide = 0;
        }

        showSlide(currentSlide);
      });

      // Event listeners for pagination buttons
      paginationButtons.forEach(function(button, index) {
        button.addEventListener("click", function() {
          currentSlide = index;
          showSlide(currentSlide);
        });
      });
    });
