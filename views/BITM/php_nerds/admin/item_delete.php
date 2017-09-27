<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 23-02-17
 * Time: 00.58
 */


require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();
$objectAddItem->set_data($_GET);
$objectAddItem->delete();