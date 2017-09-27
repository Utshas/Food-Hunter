<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 04.05
 */

require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

$objectAddItem->set_data($_POST);
$single_item = $objectAddItem->single_item();

if($_FILES['item_picture']['name']!= ""){
    $old_file_path = "uploaded_files/$single_item->item_picture";
    unlink($old_file_path);
    $file_name = $_FILES['item_picture']['name'];
    $file_name = time().$file_name;
    $_POST['item_picture'] = $file_name;
    $fle_location = $_FILES['item_picture']['tmp_name'];
    $destination = "uploaded_files/$file_name";
    move_uploaded_file($fle_location, $destination);
}else{
    $_POST['item_picture'] = $single_item->item_picture;
}

$objectAddItem->set_data($_POST);
$objectAddItem->update();