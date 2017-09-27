<?php
require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)){
    session_start();
}
$objHobby = new \App\Foodlist\Foodlist();
$allData = $objHobby->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food List</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <style>
        body {
            font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
            background: url('../../../../resources/img/banner-bg.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        p {font-size: 16px;}
        .margin {margin-bottom: 45px;}

        table{
            width:560px;
        }
        td,th{width:140px;}
        .checkBox{
            margin: 0 4%;
        }
        .box {
            margin-bottom: 20px;
            padding: 30px 15px;
            background: #fff;
            background: rgba(255,255,255,0.8);
        }
        table td,th{text-align: center;}
    </style>
</head>
<body>
<div class="container bg-1">
    <h1 style="color:#fff; text-shadow: 1px 1px 1px #222;" class="text-center">Food List</h1>
    <div class="form-group Form text-center box">
        <form action="store.php" method="post">
                <?php echo"<input type='hidden' style='width:600px;' name='user_email' value=".$_SESSION['email'].">"; ?>
            <h3>Please Select Foods </h3>
<br>


            <table class="table table-striped">

                <tr class="bg-3">
                    <th>Index</th>
                    <th>Food Name</th>
                    <th>Picture</th>
                    <th>Price</th>
                    <th>quantity</th>
                    <th>Add to cart</th>
                </tr>
                <?php
                $serial=1;
                foreach ($allData as $oneData) {

                    if($serial%2){
                        $bgColor = "#eee";
                    }else{
                        $bgColor = "#ddd";
                    }
                    $name="hobby";
                    $q="quantity";
                    echo "
            <tr style='background-color: $bgColor' class='bg-4'>
                <td>$serial</td>
                <td>$oneData->item_name</td>
                <td><img src='../admin/uploaded_files/$oneData->item_picture' style='width:200px; height: 100px;'> </td>
                <td>$oneData->item_price</td>
                <td><input type='number' name=".$q.$serial." style='width:62px;'></td>
                <td><input type='checkbox' name=".$name.$serial." value=$oneData->item_name> </td>
            </tr>
        ";
                    echo"<input type='hidden' name="."price".$serial." value=".$oneData->item_price.">";
                    $serial++;

                }
                echo"<input type='hidden' name='serial' value=".$serial.">";
                ?>
            </table>


            <input type="submit" class="btn btn-primary" value="Add to Cart">
        </form>
    </div>
</div>

</body>
</html>