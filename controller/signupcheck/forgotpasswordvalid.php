<?php

require '../../model/databasefunction.php';


if(isset($_POST['phone'] ) && isset($_POST['email']) && isset($_POST['username']) ){
$phone = $_POST['phone'];  
$email = $_POST['email'];  
$username = $_POST['username'];

if(str_starts_with($username,"Gu-")){
if (checkUserAvailability4( (str_replace("Gu-","",$username)), $email ,$phone,'guestregistation')){
    echo "Matched";
}
else {
    echo "did not matched";
}
}
else if(str_starts_with($username,"Ho-")){
if (checkUserAvailability4( (str_replace("Ho-","",$username)), $email ,$phone,'hostregistation')){

    echo "Matched";
}
else {
    echo "did not matched";
}
}
else {
    echo "Fill up";
}
}

?>