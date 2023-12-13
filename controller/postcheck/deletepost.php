<?php

session_start();
require_once("../../model/postfunction.php");
if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {


//send user data to database

if(deletepost($_GET['post_id'])){
    header("Location: ../../view/host/viewApost.php");
}
else{
    echo "error <br>";
    echo "<a href='../../view/host/viewApost.php'>Back</a>";

}


}













?>