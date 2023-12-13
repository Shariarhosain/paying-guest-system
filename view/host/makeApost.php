<?php
session_start();

if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}
if(isset($_SESSION['post_data'])){


   $houseNumber = $_SESSION['post_data']['housenumber']? $_SESSION['post_data']['housenumber']:'';
   $address= $_SESSION['post_data']['address']? $_SESSION['post_data']['address']:'';
    $numberofrooms= $_SESSION['post_data']['numberofrooms'];
    $gender= $_SESSION['post_data']['gender'];  
    $rent= $_SESSION['post_data']['rent'];

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make A Post</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src='../../js/makeApost.js'></script>
</head>
<body>
   
<div class="container">
    <center>
    <form action="../../controller/postcheck/makeApostcheck.php" method="post" onsubmit="return validateForm();">
        <fieldset class="registation" >
            <legend>Make A Post</legend>
            House Number:
            <input type="text" name="housenumber" id="housenumber" value="<?php if(isset($houseNumber)){echo $houseNumber;} ?> "required><br><br>
            <p id="availability3"></p>
            Number of Rooms:
            <input type="number" name="numberofrooms" id="numberofrooms" value="<?php if(isset($numberofrooms)){echo $numberofrooms;} ?>" required><br><br>
            Prafareble Gender:
            <input type="radio" name="gender" value="male" <?php if(isset($gender)){if ($gender == 'male') echo 'checked';} ?> required>Male
                  <input type="radio" name="gender" value="female" <?php if(isset($gender)){if ($gender == 'female' ) echo 'checked';} ?>>Female
                  <input type="radio" name="gender" value="both" <?php if(isset($gender)){if ($gender == 'both' ) echo 'checked';} ?>>Both(male/female)<br><br>
            Rent:
            <input type="number" name="rent" id="rent" value="<?php if(isset($rent)){echo $rent;}?>"required><br><br>
            Address:
            <input type="textarea" name="address" id="address" value="<?php if(isset($address)){echo $address;}?>" oninput='ajax2()'><br>
            <p id="availability2"></p>
            <?php
             if (isset($_SESSION['postaddErr'])) {
    if( $_SESSION['postaddErr']=="true"){
      echo "You can't post with same address and house number because house number already exit with this address <br><br>"; 
    }
    
    unset($_SESSION['postaddErr']);

}?>
            
            
            
            <input type="hidden" name="username" value="<?php echo $_SESSION['afterlogin']['username'] ?>">
            <input type="hidden" name="bookingstatus" value="empty">
            <input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
            <input type="hidden" name="uniquepostid" value="<?php echo uniqid(); ?>">
            <input type="submit" class="btn" name="submit" id="submit" value="submit"> &nbsp; &nbsp; &nbsp; &nbsp;  <a href="hostprofile.php"?<?php unset($_SESSION['post_data']) ?>>Back</a>



        </fieldset>
    </form>
    </center>
</div>
   
<script src="../../js/ajaxhost.js"></script> 


  
</body>

</html>
