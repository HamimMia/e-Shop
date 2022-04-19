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
<!---------------nav start--------------->
<?php
include 'views/nav.php'
?>
<!----------------nav end---------------->

<body>

<div class="offer">
    New offer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> <a href="#">Click me</a> <--
</div>


<div class="container">
    <div class="row">
        <div class="col-md-12"">
        <div class="sub-nav bg-white shadow">
            Sub-navigation
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-3">
        <?php
        include 'views/side_nav.php';
        ?>
    </div>
    <div class="col-md-9">
        <div class="bg-white shadow col-md-12">
            <?php
            include 'functions.php';
            $edit_id = $_GET['cat_edit_id'];
            $sql = ("SELECT * FROM categories WHERE cat_id = '$edit_id'");
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            ?>
                <form action="" method="post">
                    <br>
                    <p>Update Category</p>
                    <br><br>
                    <div class="row">
                        <div class="col-md-7 offset-md-1">
                            <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-1 form-control" name="update_cat" value="Update">
                        </div>
                    </div>
                </form>
                <?php } ?>
            <br><br><br>
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