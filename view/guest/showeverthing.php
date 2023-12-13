<?php 
session_start();


require "../../controller/historycheck/historyfunction.php";

if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>show all info foe guest</title>
</head>
<body>
    <a href="guestprofile.php">Back</a>
<?php 


showinfo_everything_guest($_SESSION['afterlogin']['username']);



?>
</body>
</html>