function validateForm() {
    const userName = document.getElementById("user_name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const userNameRegex = /^[a-zA-Z]+(?: [a-zA-Z]+(?: [a-zA-Z]+(?: (?:bin|ibn) )*[a-zA-Z]+)*)*(?: @ [a-zA-Z]+)?$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (!userNameRegex.test(userName)) {
        alert("Please enter a valid full name.");
        return false;
    }

    if (!emailRegex.test(email)) {
        alert("Please enter a valid email.");
        return false;
    }

    if (!passwordRegex.test(password)) {
        alert("Password must contain at least one number, one uppercase and one lowercase letter, and at least 8 or more characters");
        return false;
    }

    return true; // Proceed with form submission if validations pass
}

