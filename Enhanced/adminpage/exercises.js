// JavaScript for handling slider functionality
document.addEventListener("DOMContentLoaded", function () {
    const sliders = document.querySelectorAll(".slider");
    const prevButton = document.querySelector(".prev-button");
    const nextButton = document.querySelector(".next-button");
    const dots = document.querySelectorAll(".dot");

    let currentIndex = 0;

    function updateSlider(index) {
        sliders.forEach((slider, i) => {
            if (i === index) {
                slider.classList.add("active");
                dots[i].classList.add("active");
            } else {
                slider.classList.remove("active");
                dots[i].classList.remove("active");
            }
        });
    }

    prevButton.addEventListener("click", function () {
        currentIndex = (currentIndex === 0) ? sliders.length - 1 : currentIndex - 1;
        updateSlider(currentIndex);
    });

    nextButton.addEventListener("click", function () {
        currentIndex = (currentIndex === sliders.length - 1) ? 0 : currentIndex + 1;
        updateSlider(currentIndex);
    });

    dots.forEach((dot, index) => {
        dot.addEventListener("click", function () {
            currentIndex = index;
            updateSlider(currentIndex);
        });
    });

    updateSlider(currentIndex);
});
