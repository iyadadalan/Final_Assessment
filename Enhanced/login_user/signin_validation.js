document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("form").onsubmit = function () {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        if (!emailRegex.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        if (!passwordRegex.test(password)) {
            alert("Password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters");
            return false;
        }

        return true;
    };
});