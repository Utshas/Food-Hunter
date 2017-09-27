<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 03.36
 */

require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

$objectAddItem->set_data($_GET);
$single_item = $objectAddItem->single_item();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit single item</title>

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
        <form action="item_update.php" method="post" class="form-signin" name="edit_item_form" id="edit_item_form" enctype="multipart/form-data">
            <label for="item_name">Name of the existing item:</label>
            <br>
            <input type="text" name="item_name" id="item_name" value="<?php echo $single_item->item_name; ?>" class="form-control" required autofocus>
            <br>
            <label for="items_ingredients">Item ingredients: </label>
            <br>
            <input type="text" name="item_ingredients" id="item_ingredients" value="<?php echo $single_item->item_ingredients; ?>" class="form-control" autofocus>
            <br>
            <label for="item_price">Item's Price:</label>
            <br>
            <input type="text" name="item_price" id="item_price" value="<?php echo $single_item->item_price; ?>" class="form-control" required autofocus>
            <br>
            <label for="item_picture">Upload Item's picture:</label>
            <br>
            <input type="file" name="item_picture" id="item_picture" class="form-group-lg">
            <br>
            <img src="uploaded_files/<?php echo $single_item->item_picture; ?>"  alt="<?php echo $single_item->item_picture?>" style="width: 200px; height: 100px;">
            <br>
            <input hidden type="number" name="item_id" value="<?php echo $single_item->item_id; ?>">
            <input type="submit" value="update" name="edit_submit" id="edit_submit" class="btn btn-lg btn-primary form-control">
        </form>
    </div>
</body>
</html>
