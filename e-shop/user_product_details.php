<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:product_details.php");
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

<div class="wait overlay">
    <div class="loader"></div>
</div>
<?php
include "views/reg_user_nav.php";
?>
<br><br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12">
            <?php
            $selected_product_id = $_GET['selected_product_id'];

            $stmt = "SELECT * FROM products WHERE product_id = '$selected_product_id'";
            $stmt_res = mysqli_query($con, $stmt);
            while ($stmt_row=mysqli_fetch_assoc($stmt_res)){
                $product_views = $stmt_row['product_views'];

                $inc_views = "UPDATE products SET product_views = '$product_views' + 1 WHERE product_id = '$selected_product_id'";
                $inc_res = mysqli_query($con, $inc_views);
            }

            $product_query = "SELECT * FROM products, categories, brands WHERE product_id = '$selected_product_id' and product_cat = cat_id and product_brand = brand_id limit 1";
            $run_query = mysqli_query($con,$product_query);
            if(mysqli_num_rows($run_query) > 0){
                while($row = mysqli_fetch_array($run_query)){
                    $pro_id    = $row['product_id'];
                    $pro_cat   = $row['product_cat'];
                    $pro_brand = $row['product_brand'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_image = $row['product_image'];
                    $pro_desc = $row['product_desc'];

                    $pro_cat_name = $row['cat_title'];
                    $pro_brand_name = $row['brand_title'];

                    echo "
                        <div class='row'>
                            <div class='product col-md-4' style='margin-bottom: 20px;'>
                                <div class='thumbnail shadow'>
                                    <div class='title' style='width: 100%; margin-left: 0%;'>
                                        <div class='product_name float-left'>
                                            <h6>$pro_title</h6>
                                        </div>
                                        <div class='price float-right'>
                                            <h6 class='badge product-badge shadow' style='background: #4fbfa8; color: #ffffff; font-size: 10pt;'>$ $pro_price</h6>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <img src='assist/product_images/$pro_image' alt='' class='img-responsive'>
                                    <div style='margin-top: 5%;'>
                                            <a pid='$pro_id' id='product' class='btn btn-1 text-center' style='width: 100%;'><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class='product col-md-8' style='margin-bottom: 20px;'>
                                <div class='thumbnail shadow'>
                                            <div class='row'>
                                                <div class='col-md-3 offset-md-1'>
                                                    <h6>Product Name</h6>
                                                <br></div>
                                                
                                                <div class='col-md-7'>
                                                    <h6>: $pro_title</h6>
                                                <br></div>
                                                
                                                <div class='col-md-3 offset-md-1'>
                                                    <h6>Product Price</h6>
                                                <br></div>
                                                
                                                <div class='col-md-7'>
                                                    <h6>: $ $pro_price</h6>
                                                <br></div>
                                                
                                                <div class='col-md-3 offset-md-1'>
                                                    <h6>Product Details</h6>
                                                <br></div>
                                                
                                                <div class='col-md-7'>
                                                    <h6>: $pro_desc</h6>
                                                <br></div>
                                                
                                                <div class='col-md-3 offset-md-1'>
                                                    <h6>Product Category</h6>
                                                <br></div>
                                                
                                                <div class='col-md-7'>
                                                    <h6>: $pro_cat_name</h6>
                                                <br></div>
                                                
                                                <div class='col-md-3 offset-md-1'>
                                                    <h6>Product Brand</h6>
                                                <br></div>
                                                
                                                <div class='col-md-7'>
                                                    <h6>: $pro_brand_name</h6>
                                                <br></div>
                                                
                                            </div>
                                </div>
                            </div>
                        </div>
                        ";
                }
            }
            ?>
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