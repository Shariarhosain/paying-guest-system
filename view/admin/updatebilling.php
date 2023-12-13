<?php    
session_start();
require "../../controller/billingcheck/billingfunction.php";





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>update payment</title>
</head>
<body>
    <a href="adminprofile.php">Back</a>
    <?php       
if( isset($_SESSION['paymentPaid'])){
    echo "payment update  done";
    unset( $_SESSION['paymentPaid']);

}
showinfo_for_admin_billing();




?>


<script src="../../js/billing.js"></script>
</body>
</html>