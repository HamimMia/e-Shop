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

            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                </tr>
                </thead>
                <?php
                $sql = ("SELECT products.product_id, products.product_brand, products.product_cat, products.product_image, products.product_title, products.product_desc, products.product_price,
                          brands.brand_id, brands.brand_title, categories.cat_id, categories.cat_title 
                          FROM products, brands, categories WHERE products.product_brand = brands.brand_id AND products.product_cat = categories.cat_id
                          GROUP BY product_id DESC");
                $result = mysqli_query($con, $sql);
                while ($row = mysqli_fetch_assoc($result)){
                $product_id = $row['product_id'];
                $brand_title = $row['brand_title'];
                $category_title = $row['cat_title'];
                $product_image = $row['product_image'];
                $product_title = $row['product_title'];
                $product_desc = $row['product_desc'];
                $product_price = $row['product_price'];
                    echo "
                <tbody>
                <tr>
                   
                    <td>$product_id</td>
                    <td>$brand_title</td>
                    <td>$category_title</td>
                    <td><img src='../assist/product_images/$product_image' alt='' style='height: 50px; width: 50px;'> </td>
                    <td>$product_title </td>
                    <td>$product_desc </td>
                    <td>$product_price </td>
                </tr>";}
                ?>
                </tbody>
            </table>
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