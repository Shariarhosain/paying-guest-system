<?php

session_start();
if(isset($_SESSION['loginApprove'])){

    unset($_SESSION['loginApprove']);
    unset($_SESSION['afterlogin']);
    setcookie("auto",true,time()-10,"/","");
        header("Location: ../view/login.php");
  }







?>




