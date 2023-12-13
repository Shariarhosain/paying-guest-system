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
    <title>admin dashboard</title>
</head>
<body>

<table>
<tr>
<td colspan="3" align="right"class="top">
   welcome admin</b> &nbsp; &nbsp;&nbsp;&nbsp;  <a href="../../controller/logout.php">logout</a>
</td>
</tr>
<tr>
    <td style="width:20%;"> <ul type="disc">
    <li><a href="adminprofile.php">Dashboard</a><br></li>
    <li><a href="updatebilling.php"> billing confirmation </a><br></li>
    
    </ul>
</td>

     <td colspan="2"></td>
    
</tr>
    
 </table>
    
</body>
</html>