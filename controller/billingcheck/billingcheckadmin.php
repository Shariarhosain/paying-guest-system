<?php       

session_start();
require "../../model/billingdb.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['history_id']) && isset($_POST['status'])) {
    $history_id = $_POST['history_id'];
    $status = $_POST['status'];


    if (set_status_bill($history_id, $status)) {
       
        echo "The payment status has been updated successfully.";
        $_SESSION['paymentPaid']="true";
    } else {
     
        echo "There was an error updating the payment status.";
    }
} else {
   
    echo "Invalid request.";
}












?>