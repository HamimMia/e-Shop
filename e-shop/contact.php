<?php
session_start();
if(isset($_SESSION["uid"])){
    header("location:profile.php");
}
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php
    include 'views/head.php';
    ?>
</head>
<body>
<div class="offer top-panel">
    New offer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> <a href="#">Click me</a> <--

    <div class="float-right">
        <!--        <a href="login_form.php" style="color: #ffffff;">Login</a>-->
        <a href='login_form.php'>Login</a>
        &nbsp;&nbsp;&nbsp;
        <a href="customer_registration.php" style="color: #ffffff;">Registration</a>
    </div>
</div>

<div class="wait overlay">
    <div class="loader"></div>
</div>
<?php
include 'views/nav.php';
?>
<div class="container-fluid">
    <br>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="bg-white bg-white shadow" style="padding: 5%;">
                <h1 class="text-center">Contact Us</h1>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="col-md-4">Address</div>
                            <div class="col-md-8">
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad eos ipsa maxime nostrum
                                    officiis placeat porro reiciendis temporibus, tenetur ullam. Distinctio ducimus error,
                                    harum neque nisi quaerat quasi quia quis?
                                </div>
                                <br>
                            </div>

                            <div class="col-md-4">Contact</div>
                            <div class="col-md-8">
                                <div>017*********
                                </div>
                                <br>
                            </div>

                            <div class="col-md-4">E-mail</div>
                            <div class="col-md-8">
                                <div>eshop@eshop.com</div>
                                <br>
                            </div>

                            <div class="col-md-4">Social media</div>
                            <div class="col-md-8">
                                <div style="color: brown;">
                                    <a href="">Google +</a>
                                    <br>
                                    <a href="">Facebook</a>
                                    <br>
                                    <a href="">Twitter</a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12" id="product_msg">
                </div>

            </div>
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