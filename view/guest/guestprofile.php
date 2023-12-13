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
    <title>Guest dashboard</title>
</head>
<body>
    

    <table >
<tr>
<td colspan="3" align="right"  class="top">
   welcome  <b><?php echo $_SESSION['afterlogin']['name'];?></b> &nbsp; &nbsp;&nbsp;&nbsp;<a href="../../controller/logout.php">logout</a> 
</td>
</tr>
<tr>
    <td style="width:20%;"> <ul type="disc">
<li><a href="guestprofile.php">Dashboard</a><br></li>
<li><a href="editprofile.php?username=<?php echo $_SESSION['afterlogin']['username'];?>">profile</a></li>
    <li><a href="showforreview.php"> Review </a><br></li>
    <li><a href="billing.php"> Billing </a><br></li>
    <li><a href="../updatepassword.php?username=<?php echo "Gu-".$_SESSION['afterlogin']['username'];?>">update password</a><br></li>
    <li> <a href="showeverthing.php">Show history</a></li>
    </ul>
</td>

     <td colspan="2"></td>
    
</tr>
    
 </table>

</body>



</html>