<?php
if(!isset($_SESSION)){
    session_start();
}
require_once ("../../../../vendor/autoload.php");
$objUser = new \App\User\User();
$objUser->setData($_SESSION);
$singleUser=$objUser->view();

$fileName=$singleUser->name."png";
$source = $_FILES['profile_picture']['temp_name'];
$destination = "../../../../UploadedFile/$fileName";
move_uploaded_file($source,$destination);

$_POST['profile_picture'] = $fileName;

$objUser->setData($_POST);
$objUser->profileUpdate();