<?php
if(!isset($_SESSION) )session_start();
require_once('../../../../vendor/autoload.php');
use App\Message\Message;
use App\Utility\Utility;


if(isset($_POST['new_password']) &&  isset($_POST['confirm_new_password'])) {

    if($_POST['new_password'] ==  $_POST['confirm_new_password']) {

        $obj = new \App\User\User();
        $_POST['password'] = $_POST['new_password'];
        $obj->setData($_POST);
        $obj->change_password();
        Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Password reset has been completed, Please login!
                </div>");
        Utility::redirect('../../../../views/BITM/php_nerds/user/registration.php');
        return;
    }
    else{
        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Password doesn't match!
                </div>");
    }
}

if(isset($_GET['email'])) {
    $obj = new \App\User\User();
    $obj->setData($_GET);
    $singleUser = $obj->view();

     if($singleUser->password != $_GET['code']){

        Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Error!</strong> Invalid Password Reset Link.
                </div>");
        Utility::redirect('registration.php');
          return;
    }

}
else{
    Utility::redirect('registration.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Need help with your password?</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../../../../resource/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/form-elements.css">
    <link rel="stylesheet" href="../../../../resource/assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../../../../resource/assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../../../resource/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../../../resource/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../../../resource/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../../../../resource/assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>
<!-- Top content -->
<div class="top-content">
    <div class="container" >
        <table>
            <tr>
                <td width='230' >

                <td width='600' height="50" >


                    <?php  if(isset($_SESSION['message']) )if($_SESSION['message']!=""){ ?>

                        <div  id="message" class="form button"   style="font-size: smaller  " >
                            <center>
                                <?php if((array_key_exists('message',$_SESSION)&& (!empty($_SESSION['message'])))) {
                                    echo "&nbsp;".Message::message();
                                }
                                Message::message(NULL);
                                ?></center>
                        </div>
                    <?php } ?>
                </td>
            </tr>
        </table>
        <br><br> <br><br> <br>
        <div class="row" >
            <div class="col-sm-12">


                <div class="form-box" style="margin-top: 0%">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Please set a new password and confirm it!</h3>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-key"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">

                            <input type="hidden" name="email" value="<?php echo $_GET['email']?>">

                            <div class="form-group">
                                <label class="sr-only" for="new_password">New Password</label>
                                <input type="password" name="new_password" placeholder="New Password" class="form-password form-control" id="form-password">
                            </div>

                            <div class="form-group">
                                <label class="sr-only" for="new_password">Confirm New Password</label>
                                <input type="password" name="confirm_new_password" placeholder="Confirm New Password" class="form-password form-control" id="form-password">
                            </div>

                            <button type="submit" class="btn"> Click Here >> Please Email Me The Password Reset Link << Click Here</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 middle-border"></div>
            <div class="col-sm-1"></div>
        </div>

    </div>
</div>


<!-- Javascript -->
<script src="../../../../resource/assets/js/jquery-1.11.1.min.js"></script>
<script src="../../../../resource/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../../../../resource/assets/js/jquery.backstretch.min.js"></script>
<script src="../../../../resource/assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../../../../resource/assets/js/placeholder.js"></script>
<![endif]-->

</body>

<script>
    $('.alert').slideDown("slow").delay(2000).slideUp("slow");
</script>

</html>

