<?php
if(!isset($_SESSION)) session_start();
require_once ("../../../../vendor/autoload.php");
$_POST['amount'] = 200;
$_POST['verified'] = 'No';
$_POST['email'] = $_SESSION['email'];

$objUser = new \App\User\User();
$objUser->setData($_POST);
$objUser->payment();




?>