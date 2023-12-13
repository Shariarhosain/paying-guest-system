<?php 


require_once("../../model/billingdb.php");




function display_info_for_billing($row){
    $result = getStatus($row['ID']);
    if($result != false){
        $row1 = mysqli_fetch_assoc($result);
    
        
        if(empty($row1['status']) || $row1['status'] == "reject"){
            display($row);
            echo "
            <form id='paymentForm".$row['ID']."'>
            <input type='hidden' name='history_id' value='".$row['ID']."'>
            <input type='hidden' name='rent' value='".$row['rent']."'><br>
            Pay with bKash: " . getBkash_number() . "<br>
            your bkash number: <br>
            <input type='number' id='bkashnumber".$row['ID']."' name='bkash_number' placeholder='Enter your bKash number' required onblur='validateBkashNumber(\"bkashnumber".$row['ID']."\", \"errorN".$row['ID']."\", \"submit".$row['ID']."\")'>
            <p id='errorN".$row['ID']."'></p>
            <p></p>
            input your bKash trxid: <br>
            <input type='text' name='trxid' id='trxid".$row['ID']."' placeholder='Enter your bKash trxid' onblur='checktrxid(\"trxid".$row['ID']."\", \"error".$row['ID']."\", \"submit".$row['ID']."\")' required ><p id='error".$row['ID']."'></p><br>
            <input type='button' class='viewbtn' id='submit".$row['ID']."' onclick='payNow(\"".$row['ID']."\", \"".$row['rent']."\", \"bkashnumber".$row['ID']."\", \"trxid".$row['ID']."\", \"paymentForm".$row['ID']."\" )' value='Pay now' disabled>
            </form>
            ";

            if(isset($row1['status']) && $row1['status'] === "reject"){
                echo "This payment is rejected because of wrong trxid or wrong bKash number<br>";
            }

            echo "</fieldset>";
            echo "</div>";
           
        }
    }
}

 
function display($row){
    
    echo "<div style='flex: 1 0 25%; max-width: 23.3%; margin: 10px;' id='container".$row['ID']."'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info for billing </h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Owner: ".$row['name']."<br>";
    echo "email: ".$row['email']."<br>";
    echo "Phone: ".$row['phone']."<br>";
    echo "Date of checkin: ".$row['checkin_date']."<br>";
    echo "Date of chekout: ".$row['checkout_date']."<br>";
    echo "Total Rent: ".$row['rent']."<br>";
   
}
 

 function show_info_billing($username){
    $data=show_info_for_billing($username);
    
    if($data == false ){
        echo "<h1>No post found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
          
            display_info_for_billing($row);
            
          
        }
        echo "</div>";
    }
}

   
function show_info_for_admin_billing($row){
    echo "<div style='flex: 1 0 25%; max-width: 23.3%; margin: 10px;' id='container".$row['ID']."'>";
    echo "<fieldset>";
    echo "<legend> <h3>Show booking Info for billing </h3></legend>";
    echo "House Number: ".$row['housenumber']."<br>";
    echo "Number of Rooms: ".$row['number_of_room']."<br>";
    echo "Rent: ".$row['rent']."<br>";
    echo "House Address: ".$row['address']."<br>";
    echo "Owner username: ".$row['host_username']."<br>";
    echo "Guest username: ".$row['guest_username']."<br>";
    echo "Total Rent: ".$row['rent']."<br>";
    echo "Payment phone number: ".$row['payment_number']."<br>";
    echo "Bkash trans Id: ".$row["bkash_trans_id"]."<br>";
    if($row['status']!="paid" && $row['status']!="rejected"){
        echo "<button class='viewbtn' onclick='updateStatus(".$row['ID'].", \"paid\")'>Confirm Payment</button>";
        echo "<button class='viewbtn' onclick='updateStatus(".$row['ID'].", \"reject\")'>Reject Payment</button>";
    }
    echo "</fieldset>";
    echo "</div>";
}
    

 function showinfo_for_admin_billing(){
    $data=show_info_for_billing_admin();
    
    if($data == false ){
        echo "<h1>No post found</h1>";
    } else {
        echo "<div style='display: flex; flex-wrap: wrap;'>";
        while ($row = mysqli_fetch_assoc($data)) {
          
            show_info_for_admin_billing($row);
            
          
        }
        echo "</div>";
    }
 }




















?>