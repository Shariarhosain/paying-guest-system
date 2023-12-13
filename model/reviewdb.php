<?php         

require_once("db.php");


function showhistory_guest($username){
    $conn=connection();
    $query="SELECT history.*,hostregistation.name,hostregistation.email,hostregistation.phone,chekin_checkout.checkin_date,chekin_checkout.checkout_date
    FROM `history`,hostregistation,chekin_checkout
    where history.host_username=hostregistation.username
    and history.checkin_checkout_id=chekin_checkout.ID
    and history.guest_username='$username'";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
           
       
    }else
    {
        return false;
    }
}
function showhistory_guest_historyid($Id){
    $conn=connection();
    $query="SELECT history.*,hostregistation.name,hostregistation.email,hostregistation.phone,chekin_checkout.checkin_date,chekin_checkout.checkout_date
    FROM `history`,hostregistation,chekin_checkout
    where history.host_username=hostregistation.username
    and history.checkin_checkout_id=chekin_checkout.ID
    and history.ID='$Id'";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
           
       
    }else
    {
        return false;
    }
}

function showhistory_host_id($Id){
    $conn=connection();
    $query="SELECT history.*,guestregistation.name,guestregistation.email,guestregistation.phone,chekin_checkout.checkin_date,chekin_checkout.checkout_date
    FROM `history`,guestregistation,chekin_checkout
    where history.guest_username=guestregistation.username
    and history.checkin_checkout_id=chekin_checkout.ID
     and history.ID='$Id';";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
           
       
    }else
    {
        return false;
    }
}
function showhistory_host_historyid($username){
    $conn=connection();
    $query="SELECT history.*,guestregistation.name,guestregistation.email,guestregistation.phone,chekin_checkout.checkin_date,chekin_checkout.checkout_date
    FROM `history`,guestregistation,chekin_checkout
    where history.guest_username=guestregistation.username
    and history.checkin_checkout_id=chekin_checkout.ID
    and history.host_username='$username'";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
           
       
    }else
    {
        return false;
    }
}



function update_guest_review($history_id,$guest_review){
    $conn=connection();
$query="update history set guest_review='$guest_review' where ID='$history_id'";
    $result=mysqli_query($conn,$query);
   
    if($result){
        return true;
           
       
    }else
    {
        return false;
    }

}

function update_host_review($history_id,$host_review){
    $conn=connection();
$query="update history set host_review='$host_review' where ID='$history_id'";
    $result=mysqli_query($conn,$query);
   
    if($result){
        return true;
           
       
    }else
    {
        return false;
    }

}







?>