<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 00.06
 */


require_once("../../../vendor/autoload.php");
use App\Utility\Utility;

$objectAdmin = new \App\Admin\Admin();
$objectAuthentication = new \App\Admin\Authentication();

if(!isset($_SESSION)){
    session_start();

}

$objectAdmin->set_data($_SESSION);
$admin_data = $objectAdmin->view();

$authenticate = $objectAuthentication->logged_in();

if(!$authenticate){
    Utility::redirect("admin/admin_create_form.php");
}


$objectAddItem = new \App\Admin\AddItem();

$all_users = $objectAddItem->all_users();
$all_users_number = count($all_users);

$all_items = $objectAddItem->all_item();
$trashed_items = $objectAddItem->trashed_items();

$all_items_number = count($all_items);
$all_trashed_items = count($trashed_items);

$ordered_list = $objectAddItem->ordered_list();
$ordered_list_number = count($ordered_list);

$transactions = $objectAddItem->transaction();
$transaction_number = count($transactions);

//search block start//
/*if(isset($_REQUEST['search']) )$someData =  $objectAddItem->search($_REQUEST);
$availableKeywords=$objectAddItem->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';

if(isset($_REQUEST['search']) ) {
    $someData = $objectAddItem->search($_REQUEST);
    $serial = 1;
}
//search block end//
*/
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

   <!-- Bootstrap core CSS -->
    <link href="../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../resources/dashboard.css">
    <link rel="stylesheet" href="../../../resources/bootstrap/css/jquery-ui.css">

    <script src="../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../resources/bootstrap/js/jquery-ui.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../resources/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



    <style>

        h2{
            text-align: center;
            font-family: monospace;
            font-weight: 600;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">HOME PAGE</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin/add_item.php">Add item!</a></li>
                <li><a href="admin/admin_profile.php"><?php echo $admin_data->admin_name. ":)"; ?></a></li>
                <li><a href="admin/log_out.php">log out!</a> </li>
                <!--<li><a href="#">Help</a></li>-->
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <!--<li><a href="#">Today's orders <span class="sr-only">(current)</span></a></li>-->

                <!--<li><a href="#todays_orders">Today's Orders</a></li>-->
                <li><a href="#todays_transaction">Today's Transaction</a></li>

            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="admin/user_list.php">List of users
                    <span class="badge"> <?php echo "".$all_users_number; ?> </span> </a></li>
                <li><a href="admin/item_list.php">List of items     <span class="badge"><?php echo" ". $all_items_number; ?></span> </a></li>
                <!--<li><a href="#">Daily users</a></li>-->
                <!--<li><a href="#">Weekly users</a></li>-->
                <!--<li><a href="#">Monthly users</a></li>-->
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="admin/item_trash_box.php">trash list   <span class="badge"><?php echo" ". $all_trashed_items; ?></span> </a></li>
            </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-right:60px;">




            <div class="table-responsive" id="todays_orders" onclick="clickHandler()">
                <h2> Today's Orders<span class="badge"> <?php echo $ordered_list_number; ?> </span> </h2>
                <table class=" table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th> Serial </th>
                        <th> Card ID </th>
                        <th> User Email </th>
                        <th> Food Name </th>
                        <th> Quantity </th>
                        <th> Price </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php   $serial = 1;
                            $background_color = "";
                            foreach($ordered_list as $single_order){
                                if($serial%2){
                                    $background_color = "#eeeeee";
                                }else{
                                    $background_color = "#ffffff";
                                }
                                echo "
                                    <tr style='background-color: $background_color'>
                                    <td> $serial </td>
                                    <td> $single_order->cart_id </td>
                                    <td> $single_order->user_email </td>
                                    <td> $single_order->food_name </td>
                                    <td> $single_order->quantity</td>
                                    <td> $single_order->price</td>
</tr>

                                ";
                                $serial++;
                            }
                    ?>
                    </tbody>
                </table>


            </div>

            <div class="table table-responsive" id="todays_transaction">
                <h2> Today's Transaction <span class="badge"><?php echo $transaction_number; ?></span> </h2>

                <table class="table table-bordered table-striped">
                    <thead><tr>
                    <th> Index </th>
                    <th> Buyer's Email </th>
                    <th> Foods Name </th>
                    <th> Total Price </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $serial = 1;
                          $background = "";
                          foreach($transactions as $transaction){
                              if($serial%2){
                                  $background = "#eeeeee";
                              }else{
                                  $background = "#ffffff";
                              }
                              echo "
                                <tr style='background-color: $background'>
                                    <td> $serial </td>
                                    <td> $transaction->user_email </td>
                                    <td> $transaction->food_name </td>
                                    <td> $transaction->price </td>

                                </tr>

                              ";
                              $serial++;
                          }


                    ?>

                    </tbody>
                </table>
                <div class="col-lg-4" style="float: right; background-color: #1a185e; color: white;">
                    <?php
                    $grand_total = 0;
                    foreach($transactions as $transaction){
                       $grand_total = $grand_total + $transaction->price;
                    }
                    echo "Grand total is:  $grand_total ";  ?>
                </div>

                <div>
                    <h2 class="page-header">Order time limit</h2>
                    <form action="../php_nerds/admin/store_time.php" method="post">
                        lunch:<br>
                        <input type="time" name="order_start_time">
                        <br>
                        <input type="time" name="order_ending_time">
                        <br>


                        <br>
                        dinner:
                        <br>
                        <input type="time" name="dinner_start_time">
                        <br>
                        <input type="time" name="dinner_ending_time">
                        <br>
                        <input type="submit" name="time_submit" value="set time">

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="../../assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
<script>
    var oElement = document.getElementById('#todays_orders');   // get a reference to your element
    oElement.onclick = clickHandler; // assign its click function a function reference

    function clickHandler() {
        // this function will be called whenever the element is clicked
        // and can also be called from the context of other functions
    }
</script>
</body>
</html>
