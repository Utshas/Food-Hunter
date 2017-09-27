<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 14-03-17
 * Time: 15.33
 */
if(!isset($_SESSION)){
    session_start();
}
require_once ("../../../../vendor/autoload.php");

$objectUser = new \App\User\User();

$objectUser->setData($_POST);

$objectUser->profile_update();