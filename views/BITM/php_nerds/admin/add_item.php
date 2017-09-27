<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 00.26
 */


require_once ("../../../../vendor/autoload.php");
use App\Message\Message;

if(!isset($_SESSION)){
    session_start();
}

$message = Message::getMessage();
echo "<div class='container'><center><div class='col-lg-6 alert alert success' id='message' style='background-color: #e38d13; align-content: center; color: white; margin-left: 20%; margin-right: 20%;'> $message</div></center></div>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add item</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="../../../../resources/add_item_style.css">
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
    <div class="container">


        <div class="container"><center><a class="page-header" href="../index.dashboard.php" style="float: right"><h2>Dashboard</h2></a></center></div>
        <div class="container"><center><h2 class="page-header">ENTER FOOD MENU HERE</h2></center></div>


        <form action="item_store.php" method="post" class="form-signin" name="add_item_form" id="add_item_form" enctype="multipart/form-data">
            <label for="item_name">Name of the item:</label>
            <br>
            <input type="text" name="item_name" id="item_name" placeholder="enter item name here!" class="form-control" required autofocus>
            <br>
            <label for="items_ingredients">Item ingredients: </label>
            <br>
            <input type="text" name="item_ingredients" id="items_ingredients" placeholder="enter item's ingredients here" class="form-control" autofocus>
            <br>
            <label for="item_price">Item's Price:</label>
            <br>
            <input type="text" name="item_price" id="item_price" placeholder="enter item price here" class="form-control" required autofocus>
            <br>
            <label for="item_picture">Upload Item's picture:</label>
            <br>
            <input type="file" name="item_picture" id="item_picture" class="form-group-lg">
            <br>
            <input hidden type="number" name="item_id">
            <input type="submit" value="add" name="add_submit" id="add_submit" class="btn btn-lg btn-primary form-control">
        </form>
    </div>

    <script src="../../../../resources/bootstrap/js/jquery.js"></script>

    <script>
        jQuery(function($) {
            $('#message').fadeOut(3000);
        })
    </script>
</body>
</html>
