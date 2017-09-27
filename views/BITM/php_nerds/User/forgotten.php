<?php
if(!isset($_SESSION) )session_start();
include_once('../../../../vendor/autoload.php');
use App\Message\Message;
use App\Utility\Utility;
use App\User\User;

if(isset($_POST['email'])) {
    $obj= new User();
    $obj->setData($_POST);
    $singleUser = $obj->view();

    $passwordResetLink= $singleUser->password ;

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
    $mail->Subject    = "Your Password Reset Link";
    $message =  "Please click this link to reset your password: 
        http://localhost/food_hunter/views/BITM/php_nerds/user/resetpassword.php?email=".$_POST['email']."&code=".$singleUser->password;
    $mail->MsgHTML($message);
    if($mail->Send()){

        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Email Sent!</strong> Please check your email for password reset link.
                </div>");
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
<form role="form" action="" method="post" >
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email...">

        <button type="submit" class="btn"> Click Here >> Please Email Me The Password Reset Link << Click Here</button>
</form>

</body>
</html>

