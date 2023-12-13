<?php         

require_once("db.php");



function geteverything_host($username){
    $conn=connection();
    $query = "SELECT history.*,  guestregistation.name,guestregistation.phone,guestregistation.email,booking.date_of_booking,
    chekin_checkout.checkin_date,chekin_checkout.checkout_date,billing.status
    from history,guestregistation,booking,chekin_checkout,billing
    where history.host_username=guestregistation.username
    and booking.booking_id=history.booking_id
    and  chekin_checkout.ID=history.checkin_checkout_id
    and billing.history_id=history.ID
    and booking.booking_approval='checkout'
    and history.host_username='$username'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        return $result;
    } else {
        return false;
    }
}





?>