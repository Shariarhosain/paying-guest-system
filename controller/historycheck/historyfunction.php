<?php  
require_once("../../model/reviewdb.php");
require_once("../../model/databasefunction.php");
require_once("../../model/historydb.php");

function display_history($row) {
    echo "<div style='flex: 1 0 25%; max-width: 23%; margin: 10px;'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info</h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Owner: ".$row['name']."<br>";
    echo "email: ".$row['email']."<br>";
    echo "Phone: ".$row['phone']."<br>";
    echo "Date of checkin: ".$row['checkin_date']."<br>";
    echo "Date of chekout: ".$row['checkout_date']."<br>";

        echo "Review by Host: ".$row['host_review']."<br>";
    
        echo "<span id='guest_review_".$row['ID']."'>Review by You: ".$row['guest_review']."</span><br>";
    
    if($row['guest_review']==""){
        // Add an ID to the div that will contain the review
        echo "<button  class='viewbtn'id='review_button_".$row['ID']."' onclick='openReviewPopup(".$row['ID'].")'>Review now</button><br>";

    }
    echo "</fieldset>";
    echo "</div>";
}
function showinformation_history($username){
    $data=showhistory_guest($username);
    if($data == false ){
        echo "<h1>No post found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
           
            display_history($row);
            
        }
        echo "</div>";
    }

}















function showinformation_history_review_guest($ID){
    $data=showhistory_guest_historyid($ID);
    if($data == false ){
        echo "<h1>No post found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
           
            display_history_for_review($row);
            
        }
        echo "</div>";
    }

}

function display_history_for_review($row) {
    echo "<div style='flex: 1 0 25%; max-width: 23%; margin: 10px;'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info</h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Owner: ".$row['name']."<br>";
    echo "email: ".$row['email']."<br>";
    echo "Phone: ".$row['phone']."<br>";
    echo "Date of checkin: ".$row['checkin_date']."<br>";
    echo "Date of chekout: ".$row['checkout_date']."<br>";
    if($row['guest_review']==""){
      echo "
      <form action='../../controller/historycheck/guestreviewcheck.php' method='post'>
      <input type='hidden' name='history_id' value='".$row['ID']."'>
         <b>Review:</b>
        <input type='text' name='guest_review' placeholder='write your review'>
        <input type='submit' name='submit' value='submit'>
        </form>";
       
    
         }
    echo "</fieldset>";
    echo "</div>";
}










function showinformation__review_host($ID){
    $data=showhistory_host_id($ID);
    if($data == false ){
        echo "<h1>No post found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
           
            display_review_host($row);
            
        }
        echo "</div>";
    }

}





function display_history_host($row) {
   
        echo "<div style='flex: 1 0 25%; max-width: 23%; margin: 10px;'>";
        echo "<fieldset>";
        echo "<legend> <h3>Show booking Info</h3></legend>";
        echo "House Number: ".$row['housenumber']."<br>";
        echo "Number of Rooms: ".$row['number_of_room']."<br>";
        echo "Rent: ".$row['rent']."<br>";
        echo "House Address: ".$row['address']."<br>";
        echo "Owner: ".$row['name']."<br>";
        echo "email: ".$row['email']."<br>";
        echo "Phone: ".$row['phone']."<br>";
        echo "Date of checkin: ".$row['checkin_date']."<br>";
        echo "Date of chekout: ".$row['checkout_date']."<br>";
    
            echo  "Review by Guest: ".$row['guest_review']."<br>";
        
            echo "<span id='host_review_".$row['ID']."'>Review by You : ".$row['host_review']."</span><br>";
        
        if($row['host_review']==""){
          
            echo "<button class='viewbtn' id='review_button_".$row['ID']."' onclick='openHostReviewPopup(".$row['ID'].")'>Review now</button><br>";
    
        }
       
  

         
    echo "</fieldset>";
    echo "</div>";
}

function display_review_host($row) {
    echo "<div style='flex: 1 0 25%; max-width: 23%; margin: 10px;'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info</h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Guset Name : ".$row['name']."<br>";
    echo "email: ".$row['email']."<br>";
    echo "Phone: ".$row['phone']."<br>";
    echo "Date of checkin: ".$row['checkin_date']."<br>";
    echo "Date of chekout: ".$row['checkout_date']."<br>";
    if($row['host_review']==""){
        echo "
        <form action='../../controller/historycheck/hostreviewcheck.php' method='post'>
        <input type='hidden' name='history_id' value='".$row['ID']."'>
           <b>Review:</b>
          <input type='text' name='host_review' placeholder='write your review'>
          <input type='submit' name='submit' value='submit'>
          </form>";
         
      
           }
    echo "</fieldset>";
    echo "</div>";
}




function showinformation_history_review_host($username){
    $data=showhistory_host_historyid($username);
    if($data == false ){
        echo "<h1>No post found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
           
            display_history_host($row);
            
        }
        echo "</div>";
    }

}



function display_everthing_guest($row){
    echo "<div style='flex: 1 0 25%; max-width: 23%; margin: 10px;'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info</h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Host Name : ".$row['name']."<br>";
    echo "email: ".$row['email']."<br>";
    echo "Phone: ".$row['phone']."<br>";
    echo "Date of checkin: ".$row['checkin_date']."<br>";
    echo "Date of chekout: ".$row['checkout_date']."<br>";
    echo "Host Review: ".$row["host_review"]."<br>";
    echo "Guest Review which is you:  ".$row["guest_review"]."<br>";
     echo "payment Status: ".$row['status']."<br>";
    echo "</fieldset>";
    echo "</div>";
}

function showinfo_everything_guest($username){
    $data=geteverthing_guest($username);
    if($data == false ){
        echo "<h1>No history found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
           
            display_everthing_guest($row);
            
        }
        echo "</div>";
    }

}
function display_everything_host($row){
    echo "<div style='flex: 1 0 25%; max-width: 23%; margin: 10px;'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info</h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Guest Name : ".$row['name']."<br>"; 
    echo "Guest email: ".$row['email']."<br>"; 
    echo "Guest Phone: ".$row['phone']."<br>"; 
    echo "Date of checkin: ".$row['checkin_date']."<br>";
    echo "Date of checkout: ".$row['checkout_date']."<br>";
    echo "Guest Review: ".$row["guest_review"]."<br>";
    echo "Host Review which is you:  ".$row["host_review"]."<br>";
    echo "Payment Status: ".$row['status']."<br>";
    echo "</fieldset>";
    echo "</div>";
}
function showinfo_everything_host($username){
    $data=geteverything_host($username);
    if($data == false ){
        echo "<h1>No history found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
            display_everything_host($row);
        }
        echo "</div>";
    }
}

?>