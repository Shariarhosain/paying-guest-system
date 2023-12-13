<?php          
session_start();
require_once("../../controller/billingcheck/billingfunction.php");

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
    <title>Billing for guest</title>
</head>
<body>
    <a href="guestprofile.php">Back</a>
<?php          
if(isset( $_SESSION['paymentrequested'])){
    echo "payment requested done wait for confirmation";
    unset( $_SESSION['paymentrequested']);
}


show_info_billing($_SESSION['afterlogin']['username']);






?>


 <script src="../../js/billing.js" ></script>

</body>
</html>