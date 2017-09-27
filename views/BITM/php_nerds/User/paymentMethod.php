<?php
if(!isset($_SESSION)) session_start();
require_once ("../../../../vendor/autoload.php");

$obj = new \App\User\User();
$obj->setData($_SESSION);
$status1 = $obj->email_exist_payment();


$verify = $obj->readPayment();

if($verify) {
    $status2 = "$verify->verified";
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Mathod</title>
</head>
<body>
    <h1>Pay your Order</h1>
    <form action="payment.php" method="post">
    <label>Bikash Number</label><br>
    <input type="tel" pattern="^\d{11}$" name="bkash_number" required><br/>
    <label>Pin Code</label><br/>
    <input type="text" name="bkash_pin"><br/>
    <label>Amount</label>
    <label>200</label>
    <input type="submit">
    </form>
    <?php

    if(!$status1)
        echo "Your Payment not verified. you can't order without payment verification ";
    else if($status2=='No')
        echo "Payment Verification Pending...";
    ?>



</body>
</html>
