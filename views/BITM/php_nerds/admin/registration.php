<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 21-02-17
 * Time: 00.04
 */

require_once ("../../../../vendor/autoload.php");
use App\Message\Message;
use App\Utility\Utility;


$objectAdmin = new \App\Admin\Admin();

$admin_row = $objectAdmin->is_empty();

if($admin_row){
    $objectAdmin->set_data($_POST);
    $objectAdmin->store();
    Message::message("Congratulation, the manager of the site! Take control of your site!");
    Utility::redirect("admin_create_form.php");
}else{
    Message::message("Only one manager is allowed here!");
    Utility::redirect("admin_create_form.php");
}



