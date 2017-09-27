<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 13-03-17
 * Time: 22.19
 */

require_once ("../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Message\Message;
if(!isset($_SESSION)) session_start();

$objectAuthentication = new \App\Admin\Authentication();
$objectAuthentication->set_data($_POST);
$status = $objectAuthentication->is_registered();


if($status){
    $_SESSION['admin_email'] = $_POST['admin_email'];
    Utility::redirect("../index.dashboard.php");
}
else{
    Message::message("Wrong information please try again!");
    Utility::redirect("admin_create_form.php");
}