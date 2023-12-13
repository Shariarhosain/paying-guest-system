<?php

require_once("../../model/editprofiledb.php");

if(isset($_POST['userData'])){
    $userData = json_decode($_POST['userData'], true);
    $table=$userData['table'];
    $result = update_user_info($userData, $table); // Function from editprofiledb.php

    if($result){
        echo json_encode(['success' => true, 'name' => $userData['name'], 'email' => $userData['email'], 'address' => $userData['address']]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>
