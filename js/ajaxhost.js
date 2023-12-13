

function ajax() {
    let username = document.getElementById('Username').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../../controller/signupcheck/validationcheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('availability').innerHTML = this.responseText;
            // If the response text is "Username already exists", disable the submit button
            if(this.responseText.trim() === "Username already exists"){
                document.getElementById('submit').disabled = true;
            } else {
                // Otherwise, enable the submit button
                document.getElementById('submit').disabled = false;
            }
        }
    };

    xhttp.send('username=' + username);
}


function ajax1() {
    let phone = document.getElementById('phone').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../../controller/signupcheck/validationcheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('availability1').innerHTML = this.responseText;
            // Check if the response text is not "number already exists"
            if(this.responseText.trim() === "number already exists"){
                document.getElementById('submit').disabled = true;
            } else {
                // If the response text is "number already exists", disable the submit button
                document.getElementById('submit').disabled = false;
            }
        }
    };

    // Pass both username and phone as parameters
    xhttp.send('phone=' + phone);
}

function ajax2() {
    let address = document.getElementById('address').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../../controller/signupcheck/validationcheck.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('availability2').innerHTML = this.responseText;
            // If the response text is "Username already exists", disable the submit button
            if(this.responseText.trim() === "Address already exists"){
                document.getElementById('submit').disabled = true;
            } else {
                // Otherwise, enable the submit button
                document.getElementById('submit').disabled = false;
            }
        }
    };

    xhttp.send('address=' + address);
}






function ajax5() {
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;

    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/signupcheck/forgotpasswordvalid.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('availability4').innerHTML = this.responseText;
            // Check if the response text is not "One or more variables already exist"
            if (this.responseText.trim() === "Matched") {
                document.getElementById('submit').disabled = false;
            } else {
                // If the response text is not "One or more variables already exist", enable the submit button
                document.getElementById('submit').disabled = true;
            }
        }
    };

    // Send all relevant data (username, address, and phone)
    xhttp.send('username=' + username +'&email=' + email +'&phone=' + phone );
}
