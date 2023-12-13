function validateForm() {
    var Name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var phonerr = "<?php echo isset($_SESSION['phoneErr']) ? $_SESSION['phoneErr'] : ''; ?>";
    var Password = document.getElementById('Password').value;
    var Username = document.getElementById('Username').value;
    var usernameErr = "<?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ''; ?>";
    var address = document.getElementById('address').value;

    if (Name === '' || email === '' || phone === '' || address === '' || Password === '' || Username === '') {
        alert('Please fill out all fields.');
        return false;
    } else if (phonerr === "true") {
        alert("Phone already exists.");
        return false;
    } else if (usernameErr === "true") {
        alert("Username already exists.");
        return false;
    }
    return true;
}

function getPasswordStrength(password) {
    if (password.length < 8) {
        return "Weak";
    } else if (password.length < 12) {
        return "Medium";
    }
     else {
        return "Strong";
    }
}


function updatePasswordStrength() {
    var passwordInput = document.getElementById("Password"); 
    var strengthIndicator = document.getElementById("strength-indicator");

    var password = passwordInput.value;
    var strength = getPasswordStrength(password);

    strengthIndicator.innerText = "Password Strength: " + strength;
}
