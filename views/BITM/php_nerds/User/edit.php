<?php
/**
 * Created by rashu.
 * User: Web App Develop-PHP
 * Date: 3/9/2017
 * Time: 9:04 PM
 */

if(!isset($_SESSION)){
    session_start();
}

require_once ("../../../../vendor/autoload.php");

$objectUser = new \App\User\User();
//var_dump($_GET);

$objectUser->setData($_GET);
$single_user = $objectUser->view_by_id();





?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edit your profile details</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3">
    <form role="form" class="form-group" name="name" action="update_profile.php" method="post">

        <label for="name"> Edit your name: </label><br/>
        <input type="text" name="name" class="form-control"  value="<?php echo $single_user->name; ?>">
        <br>
        <input type="radio" name="gender" class="form-control"  value="<?php echo $single_user->gender; ?>">
        <br>
        <input hidden type="number" name="id" value="<?php echo $single_user->id;  ?>">

        <br/>

        <div class="col-xs-6 col-md-6 col-xs-offset-3 col-md-offset-3">
            <input type="submit" name="submit" class="form-control btn btn-primary">
        </div>
    </form>
</div>

</body>
</html>





