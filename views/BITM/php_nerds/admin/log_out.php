<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 13-03-17
 * Time: 23.18
 */

require_once ("../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Message\Message;

if(!isset($_SESSION)){
    session_start();
}

$objectAuthentication = new \App\Admin\Authentication();

$log_out = $objectAuthentication->log_out();

if($log_out){
    session_destroy();
    session_start();
    Utility::redirect("admin_create_form.php");
}