document.getElementById("password").disabled = true;
 document.getElementById("submit").disabled = true;
 function PasswordValidation(){
    var currentPassword = document.getElementById("current").value;
    var messageElement = document.getElementById("error1");
    

    if(currentPassword.length > 0){
        if(currentPassword.length < 8){
            messageElement.innerHTML = "Password must be at least 8 characters long";
            document.getElementById("password").disabled = true;
            document.getElementById("submit").disabled = true;
        }
        else{
            
            let xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../controller/updatepasswordcheck.php', true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    messageElement.innerHTML = this.responseText;
                    if (this.responseText.trim() != 'password matched') {
                        messageElement.style.color = "red";
                        document.getElementById("password").disabled = true;
                        document.getElementById("submit").disabled = true;
                    }
                    else{
                     
                        messageElement.style.color = "green";
                        document.getElementById("password").disabled = false;
                        document.getElementById("submit").disabled = false;
                    }
                }
            }
            xhttp.send('currentpassword='+currentPassword +'&username='+document.getElementById("username").value);
        }
    }
    else{
        
        messageElement.innerHTML = "";
        document.getElementById("password").disabled = true;
        document.getElementById("submit").disabled = true;
    }
}



 

function validatePassword(password) {
 
    // A. Password must contain at least one of the special characters (@, #, $, %)
    var validChars = ['@', '#', '$', '%'];

    
    for (var i = 0; i < validChars.length; i++) {
        if (password.indexOf(validChars[i]) > -1) {
            return true;
        }
    }

    return false;
}

function checkPassword(){
    var newPassword = document.getElementById("password").value;
    var currentPassword = document.getElementById("current").value;
    if(newPassword.length < 8 ){
        document.getElementById("error2").innerHTML = "Password must be at least 8 characters long";
        document.getElementById("submit").disabled = true;
 
    } else if(newPassword == currentPassword){
        document.getElementById("error2").innerHTML = "New password must be different from current password";
        document.getElementById("submit").disabled = true;
    } 
    else{

        if(!validatePassword(newPassword)){
            document.getElementById("error2").innerHTML = "Password must contain at least one of the special characters (@, #, $, %)";
            document.getElementById("submit").disabled = true;
        } else{
            document.getElementById("error2").innerHTML = "";
            document.getElementById("submit").disabled = false;
        }
        
       
    }
     


    
}








