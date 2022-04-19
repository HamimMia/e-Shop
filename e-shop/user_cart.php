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
<div class="container-fluid">
    <div class="row">
        <div class="panel-body bg-white shadow col-md-10 offset-md-1" style="border: 1px solid lightgray;">
                <div class="row text-center" style="background: lightgray; padding: 10px;">
                    <div class="col-md-2 "><b>Product Image</b></div>
                    <div class="col-md-2 "><b>Product Name</b></div>
                    <div class="col-md-2 "><b>Quantity</b></div>
                    <div class="col-md-2 "><b>Product Price</b></div>
                    <div class="col-md-2 "><b>Total Price</b></div>
                    <div class="col-md-2 text-center"><b>Action</b></div>
                </div>
                <div id="cart_checkout" style="padding: 20px;"></div>
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