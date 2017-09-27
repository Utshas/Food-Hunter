<?php
require_once("../../../../vendor/autoload.php");

$objHobby = new \App\Cart\Cart();
$objHobby->setData($_GET);
$oneData = $objHobby->view();

if(isset($_GET['YesButton'])) $objHobby->delete();

?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> SingleInformation</title>
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../resource/bootstrap/css/bootstrap-theme.min.css">
    <script src="../../../resource/bootstrap/js/bootstrap.min.js"></script>


    <style>

        td{
            border: 0px;
        }

        table{
            border: 1px;
        }

        tr{
            height: 30px;
        }
    </style>



</head>
<body>


<div class="container">
    <h1 style="text-align: center" ;">Are you sure you want to delete the following record?</h1>

    <table class="table table-striped table-bordered" cellspacing="0px">


        <tr>
            <th style='width: 10%; text-align: center'>ID</th>
            <th>food Name</th>
            <th>quantity</th>
        </tr>

        <?php

        echo "

                  <tr >
                     <td style='width: 10%; text-align: center'>$oneData->cart_id</td>
                     <td>$oneData->food_name</td>
                     <td>$oneData->quantity</td>

                  </tr>
              ";

        ?>

    </table>

    <?php
    echo "
          <a href='delete.php?id=$oneData->cart_id&YesButton=1' class='btn btn-danger'>Yes</a>

          <a href='trashed.php' class='btn btn-success'>No</a>
        ";

    ?>
</div>


<script src="../../../resource/bootstrap/js/jquery.js"></script>

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