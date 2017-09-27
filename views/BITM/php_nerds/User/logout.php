<?php
/**
 * Created by PhpStorm.
 * User: Rajesh Kumar Nath
 * Date: 04-03-17
 * Time: 21.09
 */
if(!isset($_SESSION )) session_start();
require_once ('../../../../vendor/autoload.php');
use App\Utility\Utility;

$objAuth = new \App\User\Auth();
$objAuth->log_out();

session_destroy();
session_start();
Utility::redirect("../index.php");
