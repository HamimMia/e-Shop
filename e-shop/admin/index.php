<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:../index.php");
}
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
    <!--                        <div class="content bg-white shadow">-->
    <!--                            <p>pagination</p>-->
    <!--                        </div>-->
    <!--                        <br>-->
                    <div class="content bg-white shadow">
                        <p class="text-center">Our Products</p>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM products ORDER BY product_views";
                        $run_query = mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($run_query)){
                            $pro_id    = $row['product_id'];
                            $pro_cat   = $row['product_cat'];
                            $pro_brand = $row['product_brand'];
                            $pro_title = $row['product_title'];
                            $pro_price = $row['product_price'];
                            $pro_image = $row['product_image'];
                            echo "
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
                                        <img src='../assist/product_images/$pro_image' alt='' class='img-responsive'>
                                        <div style='margin-top: 5%;'>
                                            <div class='text' style='width: 80%;'>
                                                <a href='product_details.php?selected_product_id=$pro_id' target='_blank' class='btn btn-1 form_control text-center' style='width: 100%;'><i class='fa fa-search' aria-hidden='true'></i>view Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                        ?>
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