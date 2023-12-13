    <?php     
    session_start(); 
    if(!isset($_SESSION['loginApprove'])){
        header("Location: ../../view/login.php");
    }
    

    if(isset($_GET['username'])){
        if(str_starts_with($_GET['username'],"Gu-")){
            $username=str_replace("Gu-","",$_GET['username']);
        
            echo" <a href='guest/guestprofile.php'>Back</a>";
        }
        else if(str_starts_with($_GET['username'],"Ho-")){
            $username=str_replace("Ho-","",$_GET['username']);
            echo" <a href='host/hostprofile.php'>Back</a>";
    ;
        }
        else if(str_starts_with($_GET['username'],"Ad-")){
            $username=str_replace("Ad-","",$_GET['username']);
            echo" <a href='admin/adminprofile.php'>Back</a>";
        
        }
    
    }




    


        ?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>update password</title>
</head>
<body>

<div class="container">
    <center>
    <form action="../controller/updatepasswordcheck.php" method="post">
        <fieldset class="registation">
        <legend>update password</legend>
        username:
        <input type="text" name="username" id="username" value="<?php echo $_GET['username'] ?>" readonly><br> <br>
      
          Current password:
          <input type="password" name="currentpassword" id="current" onblur="PasswordValidation()"  required>
<p  id="error1" ></p>
<br>

        
        
        new password:
        <input type="password" name="password" id="password" oninput="checkPassword()" required > <p id="error2"></p><br><br>
       
        <?php if (isset($_GET['pass'])) {
            if($_GET['pass']== "empty"){
              echo "password must not be less than eight (8) character and must contain at least one of the special characters (@, #, $, %)";
            }
            
            unset($_GET['pass']);
        
        }?>



        <input type="submit" class="btn" name="submit" id="submit" value="submit">

        </fieldset>
    </form>
    </center>
</div>

    <script src="../js/validation.js"></script>


</body>
</html>