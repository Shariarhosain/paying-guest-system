<?php
session_start();
if(!isset($_SESSION['loginApprove'])){
    header("Location: ../../view/login.php");
}

require_once("../../model/postfunction.php");

if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $_SESSION['post_id'] = $post_id;
    $post = getpost($post_id);
    $result=mysqli_fetch_assoc($post);
}

if(isset($_SESSION['update_post'])){
    $houseNumber = $_SESSION['update_post']['housenumber']? $_SESSION['update_post']['housenumber']:'';
    $address= $_SESSION['update_post']['address']? $_SESSION['update_post']['address']:'';
    $numberofrooms= $_SESSION['update_post']['numberofrooms'];
    $gender= $_SESSION['update_post']['gender'];  
    $rent= $_SESSION['update_post']['rent'];

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make A Post</title>
</head>
<body>
   

    <form action="../../controller/postcheck/editpostcheker.php" method="post">
        <fieldset style="width:30%;">
            <legend>Make A Post</legend>
            House Number:
            <input type="text" name="housenumber" id="housenumber" value="<?php if(isset($houseNumber)){echo $houseNumber;}else{echo $result['House_Number'];} ?>" required><br><br>
            Number of Rooms:
            <input type="number" name="numberofrooms" id="numberofrooms" value="<?php if(isset($numberofrooms)){echo $numberofrooms;} else{echo $result['Number_of_Rooms'];} ?>" required><br><br>
            Prafareble Gender:
            <input type="radio" name="gender" value="male" <?php if(isset($gender)){if ($gender == 'male') echo 'checked';}else if($result['Prafareble_Gender']=='male') echo 'checked'; ?> required>Male
                  <input type="radio" name="gender" value="female" <?php if(isset($gender)){if ($gender == 'female' ) echo 'checked';}else if($result['Prafareble_Gender']=='female') echo 'checked';?>>Female
                  <input type="radio" name="gender" value="both" <?php if(isset($gender)){if ($gender == 'both' ) echo 'checked';} else if($result['Prafareble_Gender']=='both') echo 'checked';?>>Both(male/female)<br><br>
            Rent:
            <input type="number" name="rent" id="rent" value="<?php if(isset($rent)){echo $rent;} else{echo $result['Rent'];} ?>"required><br><br>
            Address:
            <input type="textarea" name="address" id="address" value="<?php if(isset($address)){echo $address;}else{echo $result['Address'];}?>"required><br>
            <?php
             if (isset($_SESSION['updatepostErr'])) {
    if( $_SESSION['updatepostErr']=="true"){
      echo "You can't post with same address and house number because house number already exit with this address <br><br>"; 
    }
    
    unset($_SESSION['updatepostErr']);

}?>
            
            
        
            <input type="submit" name="update" value="update"> || <a href="viewApost.php"?<?php unset($_SESSION['update_post']) ?>>Back</a>



        </fieldset>
</body>
</html>
