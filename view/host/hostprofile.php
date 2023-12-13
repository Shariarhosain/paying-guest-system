<?php

session_start();


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
    <title>host Dashboard</title>
</head>
<body>
 <table>
<tr>
<td colspan="3" align="right" class="top">
   welcome  <b><?php echo $_SESSION['afterlogin']['name']; ?></b> &nbsp; &nbsp;&nbsp;&nbsp;<a href="../../controller/logout.php">logout</a> 
</td>
</tr>
<tr>
    <td> <ul type="disc">
    <li><a href="hostprofile.php">Dashboard</a><br></li>
    <li><a href="editprofile.php?username=<?php echo $_SESSION['afterlogin']['username'];?>">profile</a></li>

    <li><a href="makeApost.php">Make a post </a></li>
    <li> <a href="viewApost.php">View all post</a><br></li>
    <li><a href="bookedpost.php">View booked post</a><br></li>
    <li><a href="showeverythinghost.php">View history</a><br></li>
    <li><a href="viewhistory.php">Review</a><br></li>
    <li><a href="../updatepassword.php?username=<?php echo "Ho-".$_SESSION['afterlogin']['username'];?>">update password</a><br></li>
    
    
    </li>
    </ul>
</td>

     <td colspan="2"></td>
    
</tr>
    
 </table>

    
</body>
</html>