<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 23-02-17
 * Time: 01.17
 */

require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

$objectAddItem->set_data($_GET);
$single_item = $objectAddItem->single_item();
if(!isset($_SESSION)){
    session_start();
    $_SESSION['item_id'] = $_GET['item_id'];
}

if($single_item == FALSE){
    echo "the function sent nothing!!";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>delete confirmation</title>
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/style.css"> -->
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../../resources/dashboard.css">
</head>
<body>
    <div class="container-fluid">
        <?php if($single_item != FALSE){ ?>
        <h3 class="page-header">The following record is going to be lost!! be sure first.</h3>
        <br>
        <table class="table-bordered table-striped">
            <thead>
            <tr>
                <th>Item name</th>
                <th>Item ingredients</th>
                <th> Item picture</th>
                <th>Item price</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td><?php echo $single_item->item_name ?></td>
                <td><?php echo $single_item->item_ingredients ?></td>
                <td ><img src='uploaded_files/<?php echo $item_field->item_picture; ?>'
                          alt='$item_field->item_picture' style='width: 200px; height:100px;'> </td>
                <td><?php echo $single_item->item_price ?></td>
            </tr>
            </tbody>
        </table>
        <?php  ?>
        <a href="item_delete.php?item_id=<?php echo $_SESSION['item_id']; ?>" class="btn btn-danger">Yes</a>
        <a href="item_trash_box.php" class="btn btn-default">No</a>
        <?php }else{ echo "no data has been selected"; ?>
        <table class="table-bordered table-striped">
            <thead>
            <tr>
                <th>Item name</th>
                <th>Item ingredients</th>
                <th>Item price</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <td>No data has been selected</td>
                <td>No data has been selected</td>
                <td>No data has been selected</td>
            </tr>
            </tbody>
        </table>
        <?php }?>
    </div>

</body>
</html>
