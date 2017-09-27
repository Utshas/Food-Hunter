<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 16-03-17
 * Time: 15.01
 */

require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

$objectAddItem->set_data($_GET);
$objectAddItem->recover();