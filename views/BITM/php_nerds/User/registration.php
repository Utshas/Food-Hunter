<?php
if(!isset($_SESSION)){
    session_start();
}

require_once ("../../../../vendor/autoload.php");

use App\Message\Message;
use App\Utility\Utility;

$message = Message::getMessage();


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Food Hunter - Daily Fresh Meal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../../../resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../../resources/css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="brand">Food Hunter - Daily Fresh Meal</div>
<div class="address-bar">House no.49 | Chadgaon Abashik | Chittagong</div>
<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="../../../../views/BITM/php_nerds/index.php">Food Hunter</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../index.php">Home</a>
                </li>
                <li>
                    <a href="../FoodList/create.php">Food Menu</a>
                </li>
                <li>
                    <a href="registration.php">Registration</a>
                </li>
                <li>
                    <a href="login.php">Log In</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <form action="store.php" method="post">
                    <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-md-6"> <label>Name:</label></div>
                        <div class="col-xs-12 col-md-6"><input type="text" name="name" required class="form-control" placeholder="Type your name"></div><br/><br/><br/>
                    </div>

                    <div class="col-xs-12 col-md-12">
                        <div class="col-xs-12 col-md-6"><label>Email Address:</label></div>
                            <div class="col-xs-12 col-md-6"><input type="email" name="email" required class="form-control" placeholder="example@gamil.com"></div><br/><br/><br/>
                    </div>

                        <div class="col-xs-12 col-md-12">
                            <div class="col-xs-12 col-md-6"><label>Password:</label></div>
                                <div class="col-xs-12 col-md-6"><input id="password" type="password" name="password" placeholder="Type Your Password" required class="form-control"></div><br/><br/><br/>
                        </div>

                            <div class="col-xs-12 col-md-12">
                                <div class="col-xs-12 col-md-6"><label >Confirm Password</label></div>
                                <div class="col-xs-12 col-md-6"><input id="confirm_password" type="password" placeholder="Retype Your Password" required class="form-control"></div><br/><br/><br/><br/>
                            </div>

                                <div class="col-xs-12 col-md-12">
                                    <div class="col-xs-12 col-md-6"><label>Gender</label></div>
                                    <div class="col-xs-6 col-md-3"><input type="radio" name="gender" value="Male" style="height: 20px; width:20px;" required ><h5>Male</h5></div>
                                    <div class="col-xs-6 col-md-3"><input type="radio" name="gender" value="Female" required style="height: 20px; width:20px;"><h5>Female</h5></div><br/><br/><br/><br/>
                                </div>

                                    <div class="col-xs-12 col-md-12">
                                        <div class="col-xs-12 col-md-6"><label>Mobile Number:</label></div>
                                        <div class="col-xs-12 col-md-6"> <input type="tel" name="mobile_number"  pattern="^\d{11}$" placeholder="Type contact number" required class="form-control"></div><br/><br/><br/><br/>
                                    </div>
                                        <div class="col-xs-12 col-md-12">
                                            <div class="col-xs-12 col-md-6"><label>Address:</label></div>
                                             <div class="col-xs-12 col-md-6"><input type="text" rows="5" cols="20" name="address" placeholder="Typr your address" required class="form-control"></div><br/><br/><br/><br/><br/>
                                        </div>

                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="col-xs-12 col-sm-6 col-md-6 text-center">
                        <p style="margin-top:-18px;">Copyright &copy; PHP NERDS Team 2017</p>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><img src="../../../../resources/img/twitter_icon.png"></a></li>
                            <li><a href="#"><img src="../../../../resources/img/facebook_icon.png"></a></li>
                            <li><a href="#"><img src="../../../../resources/img/vimeo_icon.png"></a></li>
                            <li><a href="#"><img src="../../../../resources/img/dribbble_icon.png"></a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- jQuery -->
    <script src="../../../../resources/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../../../resources/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

    <script>
        var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

</body>

</html>

