<?php



$dbhost = "localhost";
$dbname = "payin-guest-project";
$dbuser = "root";
$dbpass = "";

function connection(){
    global $dbhost;
    global $dbname;
    global $dbpass;
    global $dbuser;

    return   mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}






?>