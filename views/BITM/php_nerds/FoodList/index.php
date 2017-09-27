<?php
require_once("../../../../vendor/autoload.php");

$objHobby = new \App\Foodlist\Foodlist();
$allData = $objHobby->index();


use App\Message\Message;


if(!isset($_SESSION)){
    session_start();
}

$msg = Message::getMessage();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Title - Active List</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../../../resources/bootstrap/bootstrap.min.css">
    <style>
        body {
            font: 20px Montserrat, sans-serif;
            line-height: 1.8;
            color: #f5f6f7;
        }
        p {font-size: 16px;}
        .margin {margin-bottom: 45px;}
        .bg-1 {
            background-color: #1abc9c; /* Green */
            color: #222222;
        }
        .bg-2 {
            background-color: #474e5d; /* Dark Blue */
            color: #ffffff;
        }
        .bg-3 {
            background-color: #ffffff; /* White */
            color: #555555;
        }
        .bg-4 {
            background-color: #2f2f2f; /* Black Gray */
            color: #ffffff;
        }
        .container {
            padding: 45px 5%;
        }
        .navbar {
            padding-top: 15px;
            padding-bottom: 15px;
            border: 0;
            border-radius: 0;
            margin-bottom: 0;
            font-size: 12px;
            letter-spacing: 5px;
        }
        .navbar-nav  li a:hover {
            color: #1abc9c !important;
        }

        input{
            color: black;
        }
        td{
            border: 0px;
        }
        table{
            width: 90%;
        }
        .msg{
            height: 20px;
        }
    </style>
</head>
<body class="bg-4">
<div class="container bg-1">
    <table class="table table-striped">

        <tr class="bg-3">
            <th>Serial Number</th>
            <th>ID</th>
            <th>Person Name</th>
            <th>Hobbies</th>
            <th>Action Buttons</th>
        </tr>
        <?php
        $serial=1;
        foreach ($allData as $oneData) {

            if($serial%2){
                $bgColor = "#1b6d85";
            }else{
                $bgColor = "#555555";
            }
            echo "
            <tr style='background-color: $bgColor' class='bg-4'>
                <td>$serial</td>
                <td>$oneData->id</td>
                <td>$oneData->user_name</td>
                <td>$oneData->hobbies</td>
                <td><a href='view.php?id=$oneData->id' class='btn btn-primary'>View</a></td>
            </tr>
        ";
            $serial++;
        }

        ?>
    </table>
    <script src="../../../resources/js/jquery.js"></script>
    <script src="../../../resources/js/jquery-3.1.1.js"></script>
    <script>
        $(document).ready(function () {
            $('.massage').fadeOut(450);
            $('.massage').fadeIn(450);
            $('.massage').fadeOut(450);
            $('.massage').fadeIn(450);
            $('.massage').fadeOut(450);
            $('.massage').fadeIn(450);
            $('.massage').fadeOut(450);
        })
    </script>
</div>

</body>
</html>