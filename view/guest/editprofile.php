<?php
session_start();
require_once("../../model/editprofiledb.php");


if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Edit profile</title>
</head>
<body>
   
 <a href="guestprofile.php">Back</a>
 <div class="container">

   <div class="text">

<?php


function display($row){
    echo "<div style='flex: 1 0 25%; max-width: 23.3%; margin: 10px;'>";
    echo "<fieldset>";
    echo "<legend><h3>Edit Profile</h3></legend>";
    echo "<strong>Name:</strong> <span id='name'>".$row['name']."</span><br>";
    echo "<strong>Phone:</strong> <span id='phone'>".$row['phone']."</span><br>";
    echo "<strong>Email:</strong> <span id='email'>".$row['email']."</span><br>";
    echo "<strong>Address:</strong> <span id='address'>".$row['address']."</span><br>";
    echo "<button onclick='showEditForm()'>Edit profile</button><br>";
    echo "<div id='editForm' style='display:none;'>";
    echo "Name: <input type='text' id='editName' value='".$row['name']."'><br>";
    echo "Email: <input type='text' id='editEmail' value='".$row['email']."'><br>";
    echo "Address: <input type='text' id='editAddress' value='".$row['address']."'><br>";
    echo "<button onclick='editpro_gu(\"".$row['username']."\")'>Save Changes</button>";
    echo "</div>";
    echo "</fieldset>";
    echo "</div>";
}
if(isset($_GET['username'])){
    $username = $_GET['username'];
    $result = get_info_by_username($username,'guestregistation');
   
    $row = mysqli_fetch_assoc($result);
   
    display($row);
   

    
}


?>

    </div>
</div>

<script src="../../js/script.js"> </script>


    
</body>
</html>