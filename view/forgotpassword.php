<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>forget password</title>

</head>
<body>

    <div class="container">
        <center>
        <form action="../controller/forgetpasswordcheck.php" method="post" oninput="ajax5()">
        <fieldset class="registation">
        <legend>Forget password</legend>
        username:
        <input type="text" name="username" id="username"required><br><br>
        email:
        <input type="email" name="email" id="email" required><br><br>
        phone:
        <input type="text" name="phone" id="phone" required><br><br>
        last password firstword:
        <input type="text" name="lastpassword" id="lastpassword" maxlength="2" required><br><br>
        <?php if (isset($_GET['matchinfo'])) {
            if($_GET['matchinfo']== "true"){
              echo "username, email, phone or last password firstword not match";
            }
            unset($_GET['matchinfo']);
        
        }?>
        <p id="availability4"></p>
        <input type="submit" class="btn" name="submit" value="submit" id="submit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login.php">login</a>
        </fieldset>
    </form>
        </center>
    </div>


    
    <script src="../js/ajaxhost.js">   </script>
</body>
</html>