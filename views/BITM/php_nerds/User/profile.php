<?php
/**
 * Created by PhpStorm.
 * User: Rajesh Kumar Nath
 * Date: 04-03-17
 * Time: 02.11
 */
if(!isset($_SESSION )) session_start();
require_once ("../../../../vendor/autoload.php");

$obj = new \App\User\User();
$obj->setData($_SESSION);
$singleUser = $obj->view();

$objAuth = new \App\User\Auth();
$status = $objAuth->logged_in();

if(!$status){
    header("Location:Login.php");
}



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>

<img src="../../../../UploadedFile/<?php echo $singleUser->profile_picture; ?>" alt="Profile Picture" width="100px" height="100px"><br/><br/>

<?php echo $singleUser->name; ?><br/>

<a href="editProfile.php">Profile Details</a><br/>
<a href="../FoodList/create.php">Food Menu</a><br/>
<a href="paymentMethod.php">Payment Area</a><br/>
<a href="logout.php">Log out</a>

</body>
</html>
