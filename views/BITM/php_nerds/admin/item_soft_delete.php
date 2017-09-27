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
$objectAddItem->soft_delete();