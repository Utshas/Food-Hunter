<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 20-02-17
 * Time: 15.32
 */

require_once ("../../../../vendor/autoload.php");
use App\Message\Message;
use App\Utility\Utility;

if(!isset($_SESSION)){
    session_start();
}


$message = Message::getMessage();
echo "<div class='container'><center><div class='col-lg-6 alert alert success' id='message' style='background-color: #e38d13; align-content: center; color: white;'> $message</div></center></div>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>create form</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/style.css"> -->
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>

    <style>
        #sign_in{
            font-family: monospace;
            font-weight: 800;

        }
        h2{
            font-family: monospace;
            font-weight: 900;
        }
        input{
            font-family: monospace;
            font-weight: 400;
        }
        label{
            font-family: monospace;
            font-weight: 800;
        }
        p{
            font-family: monospace;
            font-weight: 400;
        }
    </style>
</head>
<body>
    <div class="nav">

    </div>
    <div class="container">
        <div class="page-header">
            <h2 style="text-align: center">Admin Panel</h2>
            <p style="text-align: center">Restricted area!</p>
        </div>
        <div class="container">
            <form class="form-group col-lg-4" action="registration.php" method="post" name="form1" id="form1">
                <h2 style="text-align: center; color: #007fff">Sign Up here!</h2>
                <br>
                <label for="admin_name">Enter your name:</label>
                <br>
                <input class="form-control" type="text" name="admin_name" id="admin_name" placeholder="Enter your name here!" autofocus required>
                <br>
                <label for="admin_email">Enter your email:</label>
                <br>
                <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Enter your email here!" autofocus required>
                <br>
                <label for="admin_password">Enter your password:</label>
                <br>
                <input class="form-control" type="password" name="admin_password" id="admin_password"
                       placeholder="Enter your password here!" autofocus required>
                <label form="repeat_admin_password">Repeat your password: </label>
                <input class="form-control" type="password" name="repeat_admin_password" id="repeat_admin_password"
                       placeholder="Repeat your password" required autofocus>
                <br>
                <input class="col-lg-4 btn-primary form-control" type="submit" name="register">
            </form>
            <form class="col-lg-4 form-group" action="authentication.php" method="post" style="float: right">
                <h2 style="text-align: center; color: #007fff">Login Area</h2>
                <br>
                <input class="form-control" type="email" name="admin_email" id="admin_email" placeholder="enter the admin email here" required autofocus>
                <br>
                <input class="form-control" type="password" name="admin_password" id="admin_password" placeholder="enter your password here" required autofocus>
                <br>
                <input class="form-control btn-default" type="submit" name="sign_in" value="sign_in" id="sign_in" style="color:#007fff;">

            </form>
        </div>
    </div>

    <section class="col-lg-4" id="registration">
        <
    </section>

    <script src="../../../../resources/bootstrap/js/jquery.js"></script>

    <script>
        jQuery(function($) {
            $('#message').fadeOut(3000);
        })
            </script>
</body>
</html>
