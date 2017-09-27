<?php

if(!isset($_SESSION)){
    session_start();
}
require_once("../../../../vendor/autoload.php");

$objHobby = new \App\Foodlist\Foodlist();


$_POST['email'] = $_SESSION['email']; //edited by rashu
$objHobby->setData($_POST);


$objHobby->store();