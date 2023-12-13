<?php 


session_start();
require_once("../../model/reviewdb.php");


if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
    
}


if(isset($_POST['reviewData'])){
  
    $reviewData = json_decode($_POST['reviewData'], true);
    $history_id = $reviewData['history_id'];
    $review = $reviewData['guest_review'];

    if(update_guest_review($history_id, $review)){
       
        echo json_encode(['guest_review' => $review]);
    } else {
     
        echo json_encode(['error' => 'Error updating review.']);
    }
}






?>