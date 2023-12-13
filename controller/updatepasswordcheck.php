<?php 
session_start();
require_once("../model/databasefunction.php");
require_once("validation.php");

if(isset($_POST['submit'])){



    if(isset($_POST['username'])){
        if(str_starts_with($_POST['username'],"Gu-")){
            $username=str_replace("Gu-","",$_POST['username']);
            $table='guestregistation';
        }
        else if(str_starts_with($_POST['username'],"Ho-")){
            $username=str_replace("Ho-","",$_POST['username']);
            $table='hostregistation';
        }
        else if(str_starts_with($_POST['username'],"Ad-")){
            $username=str_replace("Ad-","",$_POST['username']);
            $table='admin';
        }
       
    }
    $password=$_POST['password'];
   
   if(validatePassword($password)){
  
   
    if(setpassword($username,$password,$table)){
        header("Location: ../view/login.php");
    }
}
    else{
      
       header("Location: ../view/updatepassword.php?username=$_POST[username]&pass=empty");
    }
}



$currentpassword=$_POST['currentpassword'];
if(str_starts_with($_POST['username'],"Gu-")){
    $username=str_replace("Gu-","",$_POST['username']);
    $table='guestregistation';
}
else if(str_starts_with($_POST['username'],"Ho-")){
    $username=str_replace("Ho-","",$_POST['username']);
    $table='hostregistation';
}
else if(str_starts_with($_POST['username'],"Ad-")){
    $username=str_replace("Ad-","",$_POST['username']);
    $table='admin';
}

if(matchPassword($username,$currentpassword, $table)){
    echo ' password matched';
    $_SESSION['currentnotmatch']="true";
}
else{
    echo 'password not matched';
    
}













?>