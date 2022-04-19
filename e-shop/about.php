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
                <h1 class="text-center">About Us</h1>
                <hr>
                <br>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                </p>
                <p>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                </p>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                </p>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                </p>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, assumenda, atque beatae commodi cum dolor eligendi
                        est excepturi facere hic itaque minus modi mollitia neque quaerat quidem veniam? Quidem, voluptas.
                    </span>
                </p>

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