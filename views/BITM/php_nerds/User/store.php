<?php

require_once ("../../../../vendor/autoload.php");

use App\User\User;
use App\User\Auth;
use App\Utility\Utility;
use App\Message\Message;

$objStore = new User();
$email = $_POST['email'];
$objStore->setData($_POST);
$status = $objStore->email_exist();

if($status){
    Message::message("Email has already been taken! Please, try another :)");
    Utility::redirect($_SERVER['HTTP_REFERER']);
}
else{
    $_POST['email_token'] = md5(uniqid(rand()));
    $objStore = new User();
    $objStore->setData($_POST);
    $objStore->store();

    require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug  = 0;
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host       = "smtp.gmail.com";
    $mail->Port       = 465;
    $mail->AddAddress($_POST['email']);
    $mail->Username="bitmphpnerds@gmail.com";
    $mail->Password="phpnerds46";
    $mail->SetFrom('bitmphpnerds@gmail.com','Food Hunter');
    $mail->AddReplyTo("bitmphpnerds@gmail.com","Food Hunter");
    //$mail->AddReplyTo("bitm.php47@gmail.com","Food Hunter");
    $mail->Subject    = "Your Account Activation Link";
    $message =  "
       Please click this link to verify your account:
        http://localhost/food_hunter/views/BITM/php_nerds/user/emailverification.php?email=".$_POST['email']."&email_token=".$_POST['email_token'];
    $mail->MsgHTML($message);
    $mail->Send();
}




