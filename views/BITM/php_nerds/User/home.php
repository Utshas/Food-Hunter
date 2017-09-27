<?php
if(!isset($_SESSION )) session_start();
require_once ("../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Message\Message;

if($_SESSION['email']==""){
    Utility::redirect("index.php");
}

$objItem = new \App\Admin\AddItem();
$all_items = $objItem->all_item();
$trashed_items = $objItem->trashed_items();

$all_items_number = count($all_items);
$all_trashed_items = count($all_items);

$obj = new \App\User\User();
$obj->setData($_SESSION);
$singleUser = $obj->view();

$objAuth = new \App\User\Auth();
$status = $objAuth->logged_in();

if(!$status){
    header("Location:Login.php");
}

$msg = Message::getMessage();

echo "<div class='container' style='height: 50px'><div id='message'> $msg </div> </div> ";



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
    <link href="../../../../resources/css/animate.css" rel="stylesheet">

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
                        <a href="../FoodList/create.php">Food Menu</a>
                    </li>
                    <li>
                        <a href="editProfile.php">Profile</a>
                    </li>
                    <li>
                        <a href="paymentMethod.php">Payment Area</a>
                    </li>
                    <li>
                        <a href="logout.php">Log Out</a>
                    </li>
                    <li>
                        <img src="../../../../UploadedFile/<?php echo $singleUser->profile_picture; ?>" alt="Profile Picture"  class="w3-circle" width="100px" height="100px"><br/><br/>
                    </li>
                    <li>
                        <?php echo $singleUser->name; ?>
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
                <div class="col-lg-12 text-center slide">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" style="height:450px;" src="../../../../resources/img/slide-a.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" style="height:450px;" src="../../../../resources/img/slide-b.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" style="height:450px;" src="../../../../resources/img/slide-c.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Food Hunter</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>
                            <strong>Good Food For Good Health</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

         <div class="row box">
            <div class=" col-xs-12 col-md-12">
                <h1 style="text-align: center;">Available Food Items</h1>
                <tbody>
                <?php
                $id="";
                $serial = 1;
                $background_color = "";
                foreach($all_items as $item_field){
                    if($serial%2) $background_color = "#eeeeee";
                    else $background_color = "#ffffff";
                    echo "<tr style='background-color: $background_color'>
                                <div style='background-color: '>
                                <div class='col-xs-6 col-md-6 itmimg' style='background-color:#A87F41;height: 200px;margin-top: 20px;'>
                                <td style='width: '><img class='img-responsive' style='height:100%;width:100%;' src='../Admin/uploaded_files/$item_field->item_picture' alt='$item_field->item_picture' style='width: 200px; height:100px;'></td>
                                </div>
                                <div class='col-xs-6 col-md-6' style='background-color: lightgoldenrodyellow;height: 200px;margin-top: 20px;'>
                                <td style='width: '><h4 style='color: maroon; font-weight: bold'>Item Name: $item_field->item_name</h4></td>
                                <td style='width: '><h4 style='color: maroon; font-weight: bold'>Item Details: $item_field->item_ingredients</h4></td>
                                <td style=><h4 style='color: maroon; font-weight: bold'>Price: $item_field->item_price TK</h4></td>
                                </div><br>
                            </tr>
                                ";
                    $serial++;

                }

                ?>


                </tbody>
            </div>
        </div>

<br><br>





</div>
    <!-- /.container -->

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
        $('.abc').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true
        });
    </script>
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>

    <script>
        jQuery(function($) {
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
            $('#message').fadeIn (550);
            $('#message').fadeOut (550);
        })
    </script>

</body>

</html>