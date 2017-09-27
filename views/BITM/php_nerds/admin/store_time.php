<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 15-03-17
 * Time: 22.11
 */

require_once ("../../../../vendor/autoload.php");

$objectAddItem = new \App\Admin\AddItem();

$objectAddItem->time_set_data($_POST);

$objectAddItem->store_time();