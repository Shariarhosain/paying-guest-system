<?php


require_once("db.php");
function postadd($data){
    $uniquepostid=$data['uniquepostid'];
    $numberofrooms=$data['numberofrooms'];
    $gender=$data['gender'];
    $rent=$data['rent'];
    $username=$data['username'];
    $bookingstatus=$data['bookingstatus'];
    $date=$data['date'];
    $houseNumber=$data['housenumber'];
    $address=$data['address'];
    $conn=connection();
    $query="select * from post where House_Number='$houseNumber' and Address='$address' and username='$username'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $_SESSION['postaddErr']="true";
    }
    else{
        $query2="insert into post values( '$uniquepostid','$houseNumber','$numberofrooms','$gender','$rent','$address','$username','$bookingstatus','$date' )";
        $result2=mysqli_query($conn,$query2);
        
    }
}
 


function viewpost($username){
    $conn=connection();
    $query="select * from post where username='$username'";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
          
       
    }else
    {
        return false;
    }
    
}

function viewallpost(){
    $conn=connection();
    $query="select post.*,hostregistation.name from post,hostregistation WHERE post.username=hostregistation.username";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
          
       
    }else
    {
        return false;
    }
}

function getpost($post_id){
    $conn=connection();
    $query="select * from post where post_id='$post_id'";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
          
       
    }else
    {
        return false;
    }
}
function updatepost($post_id, $data) {
    $numberofrooms = $data['numberOfRooms'];
    $gender = $data['preferableGender'];
    $rent = $data['rent'];
    $username = $data['username'];

    $houseNumber = $data['houseNumber'];
    $address = $data['address'];
    $conn = connection("localhost", "root", "", "payin-guest-project");
  //
        // Perform the update if no conflicting post is found
        $query2 = "UPDATE post SET House_Number = '$houseNumber', Number_of_Rooms = '$numberofrooms', Prafareble_Gender = '$gender', Rent = '$rent', Address = '$address' WHERE post_id = '$post_id'";
        $result=mysqli_query($conn, $query2);
       if($result){
           return true;
       }
       else{
           return false;
       }

}


function deletepost($post_id){
    $conn=connection();
    $query="delete from post where post_id='$post_id'";
    mysqli_query($conn,$query);
    return true;
}

function viewAllpost_forguest($username){
    $conn=connection();
    $query="SELECT booking.*, guestregistation.name,guestregistation.email,guestregistation.phone,post.House_Number,post.Number_of_Rooms,post.Prafareble_Gender,post.Rent,post.Address,post.Booking_Status,post.Date_of_Post
    from booking,guestregistation,post
    where booking.username=guestregistation.username 
    and booking.post_id=post.post_id and booking.username='$username' and booking.booking_approval IN('requested','approved')";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
          
       
    }else
    {
        return false;
    }

}



?>