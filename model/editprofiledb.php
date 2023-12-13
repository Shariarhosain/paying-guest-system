<?php 


require_once("db.php");

function get_info_by_username($username,$table){
        $conn=connection();
        $sql = "select * from  $table where username='{$username}'";
        $result = mysqli_query($conn, $sql);
     if(mysqli_num_rows($result)>0){
         return $result;
     }
     else{
         return false;
     }


}
function update_user_info($userData,$table) {
    $conn=connection();
    // Extract the data from the userData parameter
    $name = $userData['name'];
    $email = $userData['email'];
    $address = $userData['address'];

    // SQL query to update user information
    $sql = "UPDATE $table SET name='{$name}', email='{$email}', address='{$address}' WHERE username='{$userData['username']}'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query executed successfully\
    if($result){
        return true;
    } else {
        return false;
    }
}









?>