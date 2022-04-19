<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:../index.php");
}
?>

<?php
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
<!----------------head start----------------->
<?php
include 'views/head.php'
?>
<!-----------------head end------------------>
<body>

<div class="offer">
    New offer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> <a href="#">Click me</a> <--
</div>

<!---------------nav start--------------->
<?php
include 'views/nav.php'
?>
<!----------------nav end---------------->

<div class="container">

<br>
<div class="row">
    <div class="col-md-3">
        <?php
        include 'views/side_nav.php';
        ?>
    </div>
    <div class="col-md-9">
        <!--                        <div class="content bg-white shadow">-->
        <!--                            <p>pagination</p>-->
        <!--                        </div>-->
        <!--                        <br>-->
        <div class="bg-white shadow col-md-12">
            <br>
            <p>Add Category here</p>
            <hr>
            <br>
            <form action="functions.php" method="post">
                <div class="row">
                    <div class="col-md-7 offset-md-1">
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-1 form-control" name="add_category" value="Add Category">
                    </div>

                </div>
            </form>
            <br>
        </div>
    </div>
</div>
<br><br><br><br><br>
</div>

<!-------------scripts start------------->
<?php
include 'views/scripts.php'
?>
<!--------------scripts end-------------->
<!-------------footer start-------------->
<?php
include 'views/footer.php'
?>
<!--------------footer end--------------->
</body>
</html>