<?php
require_once("../../../../vendor/autoload.php");

$objHobby = new \App\Cart\Cart();

$objHobby->setData($_POST);


$objHobby->store2();