<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> 
    <title>login </title>
</head>
<body>
    <div class="container">
    <center>
     <form action="../controller/logincheck/logincheck.php" method="post">

<fieldset>
   <legend>Login</legend>
   username: <input type="text" name="username" id="username" required><br><br>
   password: <input type="password" name="password" id="password"required><br><br>
 <div class="content">
 <?php
   if(isset($_SESSION['login'])){
       if($_SESSION['login']=="true"){
           echo "username or password incorrect <br><br>";
       }
       unset($_SESSION['login']);
   } else if (isset($_SESSION['hostlogin'])){
       if($_SESSION['hostlogin']=="true"){
           echo "Welcome Host but your username or password incorrect <br><br>";
       }
       unset($_SESSION['hostlogin']);
   } else if (isset($_SESSION['guestlogin'])){
       if($_SESSION['guestlogin']=="true"){
           echo "Welcome guest but your username or password incorrect <br><br>";
       }
       unset($_SESSION['guestlogin']);
   } else if (isset($_SESSION['adminlogin'])){
       if($_SESSION['adminlogin']=="true"){
           echo "welcome admin but your username or password incorrect <br><br>";
       }
       unset($_SESSION['adminlogin']);
   }




?>

 </div>
  <input type="submit" class="btn" name="login" value="login"> <br> <a href="registation/chooseuser.html">Sign up</a> &nbsp;  &nbsp;  &nbsp; 
    <a href="forgotpassword.php">Forgot password</a>

</fieldset>


</form>
     </center>
    </div>
</body>
</html>