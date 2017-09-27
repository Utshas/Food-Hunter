<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 22-02-17
 * Time: 00.26
 */

if(!isset($_SESSION)){
    session_start();
}

require_once ("../../../../vendor/autoload.php");

$objectAdmin = new \App\Admin\Admin();


$objectAdmin->set_data($_SESSION);
$admin_data = $objectAdmin->view();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admins Profile</title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/style.css"> -->
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/jquery-ui.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../../resources/bootstrap/js/jquery-ui.js"></script>

</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../index.dashboard.php">Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="log_out.php">log out!</a> </li>
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right" name="search_form" id="search_form">
                <input type="text" class="form-control" placeholder="Search...">
                <input hidden type="submit" name="search_submit">
            </form>
        </div>
    </div>
</nav>

<br>
<br>

<center> <h2 class="page-header"> <?php echo $admin_data->admin_name."(". $_SESSION['admin_email'].")"; ?></h2></center>
</body>
</html>

