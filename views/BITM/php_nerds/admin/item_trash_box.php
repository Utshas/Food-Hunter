<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 00.06
 */
require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

$all_items = $objectAddItem->trashed_items();
$total_items = count($all_items);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trash Box</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../favicon.ico">-->

    <!-- Bootstrap core CSS -->
    <link href="../../../../resources/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../../resources/dashboard.css" rel="stylesheet">

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
            <a class="navbar-brand" href="../index.dashboard.php">Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="admin_profile.php">Profile</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right" name="search_form" id="search_form">
                <input type="text" class="form-control" placeholder="Search...">
                <input hidden type="submit" name="search_submit">
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

            <h1 style="text-align: center" class="sub-header">Trashed item list: <?php echo $total_items; ?></h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Item Name</th>
                        <th>Item Ingredients</th>
                        <th> Item picture </th>
                        <th>Item Price</th>
                        <th>Action buttons</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $id="";
                    $serial = 1;
                    $background_color = "";
                    foreach($all_items as $item_field){
                        if($serial%2) $background_color = "#eeeeee";
                        else $background_color = "#ffffff";
                        echo "<tr style='background-color: $background_color'>
                                <td style='width: '>$serial</td>
                                <td style='width: '>$item_field->item_name</td>
                                <td style='width: '>$item_field->item_ingredients</td>
                                 <td ><img src='uploaded_files/$item_field->item_picture'
                                 alt='$item_field->item_picture' style='width: 200px; height:100px;'> </td>
                                <td style=>$item_field->item_price</td>
                                ";
                        $serial++;
                        echo "<td style=><a class='btn btn-default' href='item_recover.php?item_id=$item_field->item_id'>Recover</a>
                                            <a class='btn btn-danger' href='item_delete_confirmation.php?item_id=$item_field->item_id'>Delete</a> </td></tr>";
                    }

                    ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
</html>
