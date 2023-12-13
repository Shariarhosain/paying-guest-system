<?php      


session_start();

require "../../model/billingdb.php";
if(isset($_POST['paymentData'])){
    // Decode the JSON data received from the AJAX request
    $paymentData = json_decode($_POST['paymentData'], true);
    $history_id = $paymentData['history_id'];
    $rent = $paymentData['rent'];
    $bkash_number = $paymentData['bkash_number'];
    $trxid = $paymentData['trxid'];
 
     
    // Process the payment using the provided data
    if(allready_insert($history_id)){ 
        set_status_billing($history_id, 'requested', $bkash_number, $trxid);
        // If the payment request is successful, send back a success message
        echo json_encode(['status' => 'success']);
    } else {
        // Call insertBilling with an associative array
        $billingData = [
            'history_id' => $history_id,
            'rent' => $rent,
            'bkash_number' => $bkash_number,
            'trxid' => $trxid
        ];
        if(insertBilling($billingData)){ // Corrected the function name to 'insertBilling'
            // If the payment is processed successfully, send back a success message
            echo json_encode(['status' => 'success']);
        } else {
            // If there was an error, send back an error message
            echo json_encode(['status' => 'error', 'message' => 'Error processing payment.']);
        }
    }

}

// Ensure the already_insert and set_status_billing functions are defined and used correctly.



if(isset($_POST['trxid'])){
    if(checktrid($_POST['trxid'])){
        echo "trxid already used";
    }
    
}












?>