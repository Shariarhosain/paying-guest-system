<?php

require_once("db.php");




function bookinginformation_bypostid($post_id){
    $conn=connection();
    $query="SELECT booking_id,booking_approval,date_of_booking,guestregistation.phone,guestregistation.name,guestregistation.email from booking,guestregistation WHERE booking.username=guestregistation.username and post_id='$post_id' and booking_approval IN('requested','approved')";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
       
    }else
    {
        return false;
    }
}






?>