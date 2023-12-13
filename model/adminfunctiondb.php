<?php 
require_once("db.php");
function viewAllpost_foradmin(){
    $conn=connection();
    $query="SELECT booking.*, guestregistation.name,guestregistation.email,guestregistation.phone,post.House_Number,post.Number_of_Rooms,post.Prafareble_Gender,post.Rent,post.Address,post.Booking_Status,post.Date_of_Post
    from booking,guestregistation,post
    where booking.username=guestregistation.username 
    and booking.post_id=post.post_id  and booking.booking_approval ='requested'";
    $result=mysqli_query($conn,$query);
   
    if(mysqli_num_rows($result)>0){
        return $result;
          
       
    }else
    {
        return false;
    }

}


function setbookig_approval_admin($post_id){
    $conn=connection();
    $query="update booking set booking_approval='approved' where post_id='$post_id'";
    mysqli_query($conn,$query);
    return true;
}


?>