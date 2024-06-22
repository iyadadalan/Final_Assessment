function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        alert("Invalid email format");
        return false;
    }
    // Additional client-side validation if needed

    return true;
}
