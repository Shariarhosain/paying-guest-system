<?php   
session_start();
require_once("../../model/postfunction.php");
require_once("../../controller/postcheck/viewApostfunction.php");


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
    <title>show Booked post</title>
</head>
<body>
 
    <a href="hostprofile.php">back</a>
    <?php 

$data=viewallpost();
display_details_of_booked_housed($data);



?>
</body>
</html>
