<?php
if(!isset($_SESSION )){
    session_start();
}
require_once ("../../../../vendor/autoload.php");
$emailVerified="";
$objAuth = new \App\User\Auth();
$status = $objAuth->logged_in();
if($status){
    header("Location:profile.php");
}

$objUser = new \App\User\User();
$objUser->setData($_GET);

$statusEmail = $objUser->email_exist();
$singleUser = $objUser->view_log_in();
if($singleUser) {
    $emailVerified = $singleUser->email_verified;
}

?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Log In - Food Hunter</title>

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
            <a class="navbar-brand" href="../index.php">Food Hunter</a>
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
<?php
if(!$emailVerified){
    ?>

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <h1>Login</h1><br>
                <form action="authentication.php" method="post">
                    <div class="col-lg-12">
                        <div class="col-xs-6 col-md-6"><label>Email</label></div>
                        <div class="col-xs-6 col-md-6"><input type="email" name="email" required class="form-control"></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-xs-6 col-md-6" style="margin-top: 20px;"><label>Password</label></div><br/>
                        <div class="col-xs-6 col-md-6"><input type="password" name="password" required class="form-control" ></div>
                    </div>
                    <br/><input type="submit" value="submit" class="btn btn-primary" style="margin-top: 20px;">

                </form>
                <a href="forgotten.php" ><h5>Forget Password</h5></a>
            </div>
        </div>
    </div>
<?php }

else if($emailVerified == 'Yes'){
?>

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                 <h1>Login</h1><br>
                <form action="authentication.php" method="post">
            <div class="col-lg-12">
                <div class="col-xs-6 col-md-6"><label>Email</label></div>
                <div class="col-xs-6 col-md-6"><input type="email" name="email" required class="form-control"></div>
            </div>
            <div class="col-lg-12">
                <div class="col-xs-6 col-md-6" style="margin-top: 20px;"><label>Password</label></div><br/>
                <div class="col-xs-6 col-md-6"><input type="password" name="password" required class="form-control" ></div>
            </div>
                    <br/><input type="submit" value="submit" class="btn btn-primary" style="margin-top: 20px;">

                </form>
                <a href="forgotten.php" ><h5>Forget Password</h5></a>
            </div>
        </div>
    </div>
<?php }
else
{ ?>
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <h2><small>Email has been Sent to your Email Account. Please Click the Link to Activate Your Account. </small></h2>
            </div>
        </div>
    </div>



    <?php
}
?>



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



</body>

</html>