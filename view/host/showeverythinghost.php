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
    <title>show all info for host</title>
</head>
<body>
    <a href="hostprofile.php">Back</a>
<?php 


showinfo_everything_host($_SESSION['afterlogin']['username']);



?>
</body>
</html>