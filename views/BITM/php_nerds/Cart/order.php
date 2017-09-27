<?php
require_once("../../../../vendor/autoload.php");
if(!isset($_SESSION)){
    session_start();
}
$objHobby = new \App\Cart\Cart();
$allData = $objHobby->index();
$email = $_SESSION['email'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order Food</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            font: 20px Montserrat, sans-serif;
            line-height: 1.8;
            color: #111;
        }
        p {font-size: 16px;}
        .margin {margin-bottom: 45px;}

        .Form{margin:20px 150px;}
        .container-fluid {
            padding-top: 70px;
            padding-bottom: 70px;
        }


        table{
            width:600px;
        }
        td,th{width:150px;}
        .checkBox{
            margin: 0 4%;
        }
    </style>
</head>
<body><div class="container bg-1">
    <a href="../../../../views/BITM/php_nerds/FoodList/create.php " class="btn btn-primary role=" button"> View item list </a>&nbsp;&nbsp;&nbsp;



    <h1 style="color:#2f2f2f" class="text-center">Order Food</h1>
    <div class="form-group Form text-center">
        <form action="../Cart/store2.php" method="post">



            <h3>Please order Foods: </h3>



            <table class="table table-striped">

                <tr class="bg-3">
                    <th style='text-align: center'>Food Name</th>
                    <th style='text-align: center'>Quantity</th>
                    <th style='text-align: center'>Total price</th>


                    <th style='text-align: center'>select</th>
                    <th style='text-align: center'>Delete</th>
                </tr>
                <?php
                $i=0;
                foreach ($allData as $oneData) {
                    $i++;
                }
                $serial=1;
                foreach ($allData as $oneData) {
                    $bgColor = "#eee";

                    $name="hobby";
                    if($serial==$i){
                    echo "
            <tr style='background-color: $bgColor' class='bg-4'>


                <td style='text-align: center'>$oneData->food_name </td>

                <td style='text-align: center'>$oneData->quantity</td>
                <td style='text-align: center'>$oneData->price</td>

                <input type='hidden' name='email' value='$email'>
                <input type='hidden' name="."quantity".$serial." value='$oneData->quantity'>
                <td style='text-align: center'><input type='checkbox' name="."food_name".$serial." value='$oneData->food_name'> </td>
                <td style='text-align: center'><a href='delete.php?id=$oneData->cart_id&YesButton=1' class='btn btn-danger'>delete</a></td>


            </tr>
        ";
                    echo"
                <input type='hidden' name='serial' value=".$serial.">";
                    echo"
                <input type='hidden' name='price' value=".$oneData->price.">";}
                    $serial++;
                }

                ?>
            </table>
            <select name="payment">
                <option value="hand">Hand</option>
                <option value="Bikash">Bikash</option>
            </select>

            <a href="trashed.php" ><input type="submit" class="btn btn-primary" value="order"></a>

        </form>
    </div>
</div>

</body>
</html>