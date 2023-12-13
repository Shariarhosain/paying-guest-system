<?php
session_start();
require_once("../../model/postfunction.php");
require_once("../../controller/postcheck/viewApostfunction.php");

if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}







if(isset($_POST['showmypost'])){
    $data1 = viewpost($_SESSION['afterlogin']['username']);
    echo displayUserposts($data1);
} else {
    $data = viewallpost();
   echo displayAllPosts($data);
}
  


?>