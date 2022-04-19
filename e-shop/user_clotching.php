<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'views/head.php';
    ?>
</head>
<body>
<div class="wait overlay">
    <div class="loader"></div>
</div>
<?php
include "views/reg_user_nav.php";
?>
<br><br>
<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 offset-md-1">
                <div class="side-bar bg-white shadow">
                    <div class="side-bar-title">
                        <p>Departments</p>
                    </div>
                    <hr>
                    <div class="side-bar-body" id="get_category">
                    </div>
                    <!--<div class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><h4>Categories</h4></a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                    </div> -->
                </div>
                <br>
                <div class="side-bar bg-white shadow">
                    <div class="side-bar-title">
                        <p>Brands</p>
                    </div>
                    <hr>
                    <div class="side-bar-body" id="get_brand">
                    </div>
                    <!--<div class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#"><h4>Brand</h4></a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Categories</a></li>
                    </div> -->
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-xs-12" id="product_msg">
                    </div>
                </div>
                <div id="get_product" class="row">
                    <!--Here we get product jquery Ajax Request-->
                </div>
                <!--<div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">Samsung Galaxy</div>
                        <div class="panel-body">
                            <img src="product_images/images.JPG"/>
                        </div>
                        <div class="panel-heading">$.500.00
                            <button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-12"">
                    <div class="sub-nav bg-white shadow" id="pageno">

                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
<?php
include 'views/footer.php';
?>

<?php
include 'views/scripts.php';
?>
</body>
</html>