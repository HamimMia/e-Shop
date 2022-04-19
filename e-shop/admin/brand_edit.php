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
            $edit_id = $_GET['brand_edit_id'];
            $sql = ("SELECT * FROM brands WHERE brand_id = '$edit_id'");
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $brand_id = $row['brand_id'];
                $brand_title = $row['brand_title'];
            ?>
                <form action="" method="post">
                    <br>
                    <p>Update Brand</p>
                    <br><br>
                    <div class="row">
                        <div class="col-md-7 offset-md-1">
                            <input type="text" name="brand_title" class="form-control" placeholder="<?php echo $brand_title ?>">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-1 form-control" name="update_brand" value="Update">
                        </div>
                    </div>
                </form>
                <?php } ?>
            <br><br><br>
        </div>
    </div>
</div>
<br><br><br><br><br>

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