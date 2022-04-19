<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:../index.php");
}
?>

<?php
include '../db.php';
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
        <!--<div class="content bg-white shadow">
            <p><i class="fa fa-search" aria-hidden="true" style="margin-right: 10px; margin-top: 5px;"></i>Search Category</p>
        </div>-->

        <div class="bg-white shadow col-md-12">
            <br>
            <form action="functions.php" method="post" enctype="multipart/form-data">
                <p>Add products here</p>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        Product Title <br>
                        <input type="text" class="form-control" name="product_title">
                        <br>
                    </div>
                    <div class="col-md-4">
                        Product Image <br>
                        <input type="file" class="form-control" name="product_image">
                        <br>
                    </div>
                    <div class="col-md-4">
                        Product Description <br>
                        <input type="text" class="form-control" name="product_desc">
                        <br>
                    </div>
                    <div class="col-md-4">
                        Product Price <br>
                        <input type="text" class="form-control" name="product_price">
                        <br>
                    </div>
                    <div class="col-md-4">
                        Product Category <br>
                        <select name="product_cat" id="" class="form-control">
                            <option value='' name='product_cat'>Select a category</option>
                        <?php
                            $sql=("select * from categories");
                            $res=mysqli_query($con, $sql);
                            while ($row=mysqli_fetch_assoc($res)){
                                $cat_id=$row['cat_id'];
                                $cat_title=$row['cat_title'];
                            echo "<option value='$cat_id' name=''>$cat_title</option>";
                            }
                        ?>
                        </select>
                        <br>
                    </div>
                    <div class="col-md-4">
                        Product Brand <br>
                        <select name="product_brand" id="" class="form-control">
                            <option value='' name='product_cat'>Select a brand</option>
                            <?php
                            $sql=("select * from brands");
                            $res=mysqli_query($con, $sql);
                            while ($row=mysqli_fetch_assoc($res)){
                                $brand_id=$row['brand_id'];
                                $brand_title=$row['brand_title'];
                                echo "<option value='$brand_id' name=''>$brand_title</option>";
                            }
                            ?>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" name="add_product" class="btn btn-1 form-control" value="Add new product">
                    </div>
                </div>
            </form>
            <br>
        </div>

    </div>
</div>
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