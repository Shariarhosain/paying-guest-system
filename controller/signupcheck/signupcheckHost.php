<?php

session_start();
include '../validation.php';
require_once("../../model/databasefunction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['reset'])) {
        unset($_SESSION['form_data']);
        header("Location: ../../view/registation/hostregistation.php");
    
    }
    else{
    $password =$_POST["password"];
    $_SESSION['form_data'] = $_POST;
    if (validatePassword($password)) {

        // The password is valid, proceed with the rest of the code
        //send user data to database
        adduser($_POST,'hostregistation');
        //check if phone number already exist
      if(isset($_SESSION['insert']) || isset($_SESSION['usernameErr']) || isset($_SESSION['phoneErr'])){
           if($_SESSION['insert']=="true" ){
            unset($_SESSION['form_data']);
            unset($_SESSION['usernameErr']);
            unset($_SESSION['phoneErr']);
            unset($_SESSION['insert']);
            header("Location: ../../view/login.php");
           
           }
           else if($_SESSION['usernameErr'] =="true"){
            $_SESSION['form_data']['username'] = '';
            header("Location: ../../view/registation/hostregistation.php");
           
           }
           else if($_SESSION['phoneErr']=="true"){
            $_SESSION['form_data']['phone'] = '';
            header("Location: ../../view/registation/hostregistation.php");
           
           }
        }
      
        
    } 
    else {
        // The password is not valid, set an error message in the session
        header("Location: ../../view/registation/hostregistation.php");
        $_SESSION['pass'] = "empty";
        $_SESSION['form_data']['password'] = '';
    }
}
}












?>