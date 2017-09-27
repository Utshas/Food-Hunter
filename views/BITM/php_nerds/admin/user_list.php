<?php
/**
 * Created by PhpStorm.
 * User: rashu
 * Date: 01-03-17
 * Time: 23.59
 */


require_once ("../../../../vendor/autoload.php");
use App\Utility\Utility;
use App\Message\Message;

$objectAddItem = new \App\Admin\AddItem();
$objectAdmin = new \App\Admin\Admin();

$all_users = $objectAddItem->all_users();
$all_user_numbers = count($all_users);

if(!isset($_SESSION)){
    session_start();

}

$objectAdmin->set_data($_SESSION);
$admin_data = $objectAdmin->view();

//search block start//
if(isset($_REQUEST['search'])){

    $all_items = $objectAddItem->search_user($_POST);
    $all_keywords = $objectAddItem->get_all_user_keywords();
    $comma_separated_keywords = '"'.implode('","',$all_keywords).'"';
}

//search block start//
if(isset($_REQUEST['search'])){

    $someData = $objectAddItem->search_user($_REQUEST);
    $serial = 1;
}
//search block end//

//pagination start//
if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;

if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;

$pages = ceil($all_user_numbers/$itemsPerPage);
$someData = $objectAddItem->user_list_pagination($page, $itemsPerPage);
$serial = (  ($page-1) * $itemsPerPage ) +1;
if($serial<1) $serial=1;
//pagination end//

//search block start//
if(isset($_REQUEST['search'])){

    $someData = $objectAddItem->search_user($_REQUEST);
    $serial = 1;
}
//search block end//


?>

<!doctype html>
<head>
    <title>
        Active users list
    </title>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="../../../../resources/bootstrap/css/bootstrap-theme.min.css">
    <!--<link rel="stylesheet" href="../../../../resources/style.css"> -->
    <script src="../../../../resources/bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../../../resources/bootstrap/css/jquery-ui.css">
    <script src="../../../../resources/bootstrap/js/jquery.js"></script>
    <script src="../../../../resources/bootstrap/js/jquery-ui.js"></script>

    <style>
        #items_table{
            margin: 50px;
            padding: 10px;
        }
        h2{
            text-align: center;
            font-family: monospace;
            font-weight: 600;
        }
    </style>


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
                <!--  <li><a href="admin_profile.php"><?php echo $admin_data->admin_name . ":)"; ?></a></li> -->
                <li><a href="#">Help</a></li>
            </ul>
            <form class="navbar-form navbar-right" name="search" id="search_form" action="">
                <input type="text" class="form-control" id="searchID" placeholder="Search...">
                <input hidden type="submit" name="search_submit">
            </form>
        </div>
    </div>
</nav>
<div class="table-responsive" id="items_table">
    <h2 class="sub-header">Active Users List<span class="badge"> <?php echo $all_user_numbers; ?> </span></h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Serial</th>
                <th>User's Name</th>
                <th>User's Email</th>
                <th>User's Picture</th>
                <th> Mobile Number </th>
                <th> Gender </th>
                <th> Address </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $id="";
            //$serial = 1;
            $background_color = "";
            foreach($someData as $item_field){
                if($serial%2) $background_color = "#eeeeee";
                else $background_color = "#ffffff";
                echo "<tr style='background-color: $background_color'>
                                <td style='width: '>$serial</td>
                                <td style='width: '>$item_field->name</td>
                                <td style='width: '>$item_field->email</td>
                                <td ><img src='uploaded_files/$item_field->profile_picture' alt='avatar' style='width: 200px; height:100px;'> </td>
                                <td style=>$item_field->mobile_number</td>
                                <td> $item_field->gender </td>
                                <td> $item_field->address </td>
                                ";
                $serial++;
            }

            ?>


            </tbody>
        </table>
    </div>
</div>

<!--  pagination block start -->
<div align="left" class="container">
    <ul class="pagination">

        <?php
        $pageMinusOne  = $page-1;
        $pagePlusOne  = $page+1;

        if($page>$pages) Utility::redirect("user_list.php?Page=$pages");
        if($page>1)  echo "<li><a href='user_list.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";

        for($i=1;$i<=$pages;$i++) {
            if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
            else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';
        }

        if($page<$pages) echo "<li><a href='user_list.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

        ?>

        <div class="pull-right" style="padding-left: 600px;">
            <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
                <?php
                if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

                if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
                else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

                if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

                if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6" selected >Show 6 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

                if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10" selected >Show 10 Items Per Page</option>';
                else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

                if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15" selected >Show 15 Items Per Page</option>';
                else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
                ?>
            </select>

        </div>
    </ul>
</div>
<!--  pagination block end -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
</body>
</html>
