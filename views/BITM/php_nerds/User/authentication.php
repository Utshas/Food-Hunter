<?php
/**
 * Created by PhpStorm.
 * User: Rajesh Kumar Nath
 * Date: 04-03-17
 * Time: 02.06
 */
require_once ("../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Message\Message;
if(!isset($_SESSION)) session_start();

$objAuth = new \App\User\Auth();
$objAuth->setData($_POST);
$status = $objAuth->is_registered();


if($status){
    $_SESSION['email'] = $_POST['email'];
    header("Location: home.php");
}
else{
    Message::message("Wrong informaton! please input valid information");
    Utility::redirect("home.php");

}

