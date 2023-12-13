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
    <title>view post</title>
</head>
<body>
<form id="postForm">
    <input type="button" id="showAllP"class="viewbtn" value="ShowAllPosts" onclick="showAllPosts()">
    <input type="text" id="username"name="username" value="'<?php echo $_SESSION['afterlogin']['username']; ?>" hidden>
    <input type="button" id="showMyP"class="viewbtn" value="ShowMyPosts" onclick="showMyPosts()">
    <a href="../../view/host/hostprofile.php">Back</a>
</form>

<div id="postsContainer">
    <div class="show">
        <?php
$data = viewallpost();
 displayAllPosts($data);





?>
    </div>
</div>

<script src="../../js/viewpost.js"></script>

</body>
</html>
