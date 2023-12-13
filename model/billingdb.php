<?php 
require_once("db.php");


function  show_info_for_billing($username){
    $conn=connection();
    $sql = "SELECT history.*,chekin_checkout.checkin_date,chekin_checkout.checkout_date,hostregistation.name,hostregistation.email,hostregistation.phone

    FROM `chekin_checkout`,history,hostregistation
    WHERE chekin_checkout.ID=history.checkin_checkout_id
    and history.host_username=hostregistation.username
    and history.`booking_id`in 
    (SELECT history.booking_id 
     from history,booking 
     where  booking.booking_id=history.booking_id
     and guest_username='$username' and booking.booking_approval='checkout')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return $result;
    }
    else{
        return false;
    }


}
function getBkash_number(){
    $conn=connection();
    $sql = "SELECT * from admin";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['bkash_number'];
}




function insertBilling($data) {
    $conn = connection();

    // Check if the history_id already exists
    $checkSql = "SELECT * FROM billing WHERE history_id = '$data[history_id]'";
    $checkResult = mysqli_query($conn, $checkSql);
    
    if(mysqli_num_rows($checkResult) > 0) {
        // history_id exists, so we don't insert a new record
        return false;
    } else {
        // history_id does not exist, proceed with insert
        $sql = "INSERT INTO billing (history_id, amount, payment_number, bkash_trans_id, status) VALUES ('$data[history_id]', '$data[rent]', '$data[bkash_number]', '$data[trxid]', 'requested')";
        $result = mysqli_query($conn, $sql);
        return $result ? true : false;
    }
}

function getStatus($history_id){
    $conn=connection();
    $sql = "SELECT status from billing where history_id='$history_id'";
    $result = mysqli_query($conn, $sql);
   return $result;
}


function allready_insert($history_id){
    $conn=connection();
    $sql = "SELECT * from billing where history_id='$history_id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
    else{
        return false;
    }
}








function  show_info_for_billing_admin(){
    $conn=connection();
    $sql = "SELECT * from billing,history
    where billing.history_id=history.ID
    and billing.status='requested'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        return $result;
    }
    else{
        return false;
    }


}



function set_status_billing($history_id,$status,$bkashNumber,$trxid){
    $conn=connection();
    $sql = "UPDATE billing SET status='$status',payment_number='$bkashNumber', bkash_trans_id='$trxid' WHERE history_id='$history_id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        return true;
    }
    else{
        return false;
    }
}
function set_status_bill($history_id,$status){
    $conn=connection();
    $sql = "UPDATE billing SET status='$status' WHERE history_id='$history_id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        return true;
    }
    else{
        return false;
    }
}


function checktrid($id){

$conn=connection();
$sql = "SELECT * from billing where bkash_trans_id='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    return true;
}
else{
    return false;
}

}
?>