<?php
/**
 * Created by PhpStorm.
 * User: Rajesh Kumar Nath
 * Date: 04-03-17
 * Time: 19.06
 */
require_once ("../../../../vendor/autoload.php");
use App\User\User;

$objUser = new User();
$objUser->setData($_GET);
$singleUser = $objUser->view();

if ($singleUser->email_verified == $_GET['email_token']){
    $objUser->setData($_GET);
    $objUser->validTokenUpdate();
}





