<?php
session_start();
require_once("../../model/postfunction.php");

if (!isset($_SESSION['loginApprove'])) {
    header("Location: ../../view/login.php");
    exit(); // Make sure no further code is executed after redirection
}

if ( isset($_POST['postData'])) {
    // Decode the JSON string from the AJAX request
    $postData = json_decode($_POST['postData'], true);

    // Call the updatepost function with the decoded data
    $result = updatepost($postData['post_id'], $postData);

    if ($result) {
        // Update was successful, send a JSON response with the updated data
        echo json_encode([
            'success' => true,
            'houseNumber' => $postData['houseNumber'],
            'numberOfRooms' => $postData['numberOfRooms'],
            'preferableGender' => $postData['preferableGender'],
            'rent' => $postData['rent'],
            'address' => $postData['address']
        ]);
    } else {
        // Update failed, send a JSON response
        echo json_encode(['success' => false]);
    }
}
?>
