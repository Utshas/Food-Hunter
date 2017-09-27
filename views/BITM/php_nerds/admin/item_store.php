<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 01.58
 */

require_once ("../../../../vendor/autoload.php");

require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

if(isset($_FILES)) {
    $file_name = $_FILES['item_picture']['name'];

    $file_location = $_FILES['item_picture']['tmp_name'];

    $file_new_name = time().$file_name;
    $destination = "uploaded_files/$file_new_name";
    move_uploaded_file($file_location, $destination);
}

$_POST['item_picture'] = $file_new_name;
$objectAddItem->set_data($_POST);
$objectAddItem->store();
?>