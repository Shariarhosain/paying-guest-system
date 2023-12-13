<?php

session_start();
require_once("../../model/databasefunction.php");
if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(str_starts_with($username,"Gu-")){
        if(checklogin(str_replace("Gu-","",$username),$password,"guestregistation")){
            $_SESSION['loginApprove']='true';
            setcookie("auto",true,time()+180,"/","");
            header("Location: ../../view/guest/guestprofile.php");
           
        }
        else{
            $_SESSION['guestlogin']="true";
            header("Location: ../../view/login.php");
        }
       
        
    } else if(str_starts_with($username,"Ho-")){
        if(checklogin(str_replace("Ho-","",$username),$password,'hostregistation')){
            $_SESSION['loginApprove']='true';
          
            header("Location: ../../view/host/hostprofile.php");
        }
        else{
            $_SESSION['hostlogin']="true";
            header("Location: ../../view/login.php");
        }

    } else if(str_starts_with($username,"Ad-")){
        if(checklogin(str_replace("Ad-","",$username),$password,'admin')){
            $_SESSION['loginApprove']='true';
            header("Location: ../../view/admin/adminprofile.php");
        }
        else{
            $_SESSION['adminlogin']="true";
            header("Location: ../../view/login.php");
        }

    }
    else{
        $_SESSION['login']="true";
        header("Location: ../../view/login.php");
    }
    
   
    
} else{
    $_SESSION['usernameErr']='true';
    
}

?>