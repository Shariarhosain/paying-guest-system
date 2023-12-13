<?php

session_start();
// user name error show
if(isset($_SESSION['form_data'])){
$username = isset($_SESSION['form_data']['username']) ? str_replace("Gu-","",$_SESSION['form_data']['username']) : '';
$email = $_SESSION['form_data']['email'] ;
$phone = isset($_SESSION['form_data']['phone']) ? $_SESSION['form_data']['phone'] : '';
$address = $_SESSION['form_data']['address'];
$gender = $_SESSION['form_data']['gender'] ;
$name= $_SESSION['form_data']['name'];
$password = isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Guest Registation</title>
    
</head>
<body>
   <div class="container">
   <center>
   <form action="../../controller/signupcheck/signupcheckGuest.php" method="post" onsubmit="return validateForm()">

  <fieldset class="registation">
       <legend>Guest Registation</legend>
         Name: <input type="text" name="name" id="name" placeholder="Please input name" value="<?php if(isset($name)){echo $name;} ?>" ><br><br>
         Email: <input type="email" name="email" id="email" placeholder="Please input email "value="<?php if(isset($email)){echo $email;} ?>" ><br><br>
         Phone: <input type="number" name="phone" id="phone" placeholder="Please input phone number " value="<?php if(isset($phone)){echo $phone;}  ?>"  oninput='ajax1()' >
         <p id='availability1'></p>
         <?php if (isset($_SESSION['phoneErr'])) {
    if( $_SESSION['phoneErr']=="true"){
      echo "phone number already exist";
    }
    
    unset($_SESSION['phoneErr']);

}?>
         
         <br><br>
         Address: <input type="textarea" name="address" id="address" placeholder="Please input address" value="<?php if(isset($address)){echo $address;}?>" > <br><br>
         Gender:  <input type="radio" name="gender" value="male" <?php if(isset($gender)){if ($gender == 'male') echo 'checked';} ?> required>Male
                  <input type="radio" name="gender" value="female" <?php if(isset($gender)){if ($gender == 'female' ) echo 'checked';} ?>>Female<br><br>
                  
        Username:  <input type="text" name="username" id="Username" value="Gu-<?php if(isset($username)){echo $username;} ?>" oninput="ajax()">
        <p id='availability'></p>
        
        
        <?php if (isset($_SESSION['usernameErr'])) {
    if($_SESSION['usernameErr']=="true"){
      echo "username already exist";
    }
    
    unset($_SESSION['usernameErr']);

}?>
<br><br>
        
Password:  <input type="password" name="password" id="Password" placeholder="Please input password "value="<?php  if(isset($password)){echo $password;} ?>" oninput='updatePasswordStrength()'>
<div id="strength-indicator"></div>
        <?php if (isset($_SESSION['pass'])) {
    if($_SESSION['pass']== "empty"){
      echo "password must not be less than eight (8) character and must contain at least one of the special characters (@, #, $, %)";
    }
    
    unset($_SESSION['pass']);

}?>
        
        <input type="submit" class="btn"id="submit" value="signup">&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="btn" type="submit"name="reset" value="Reset">   <br> <a href="chooseuser.html">Change User</a><br><br>
        <br>
       Already have an account?<a href="../login.php">login</a>     
    
    
    </fieldset>
  </center>
    </form>
   </div>
    <script src=../../js/hostjs.js></script>
    <script src="../../js/ajaxhost.js"></script>
</body>
</html>