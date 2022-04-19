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


<section id="slider" class="slider">
    <div id="wrapper" class="slides-wrapper">
        <div id="slide" class="slide" data-slide-id="0">
            <img class="slide__img" src="assist/image/banner1.jpg" alt="slider-0">
            <div class="slide__caption">
                <span class="slide__caption--title">Slide 1</span>
                <span class="slide__caption--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam assumenda nostrum quisquam voluptatem consectetur dolore, necessitatibus doloribus temporibus, enim animi adipisci architecto ipsum, labore corporis! Quaerat doloribus consequatur ex blanditiis?</span>
            </div>
        </div>
        <div id="slide" class="slide" data-slide-id="1">
            <img class="slide__img" src="assist/image/banner2.jpg" alt="slider-1">
            <div class="slide__caption">
                <span class="slide__caption--title">Slide 2</span>
                <span class="slide__caption--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam assumenda nostrum quisquam voluptatem consectetur dolore, necessitatibus doloribus temporibus, enim animi adipisci architecto ipsum, labore corporis! Quaerat doloribus consequatur ex blanditiis?</span>
            </div>
        </div>
        <div id="slide" class="slide" data-slide-id="2">
            <img class="slide__img" src="assist/image/banner3.jpg" alt="slider-2">
            <div class="slide__caption">
                <span class="slide__caption--title">Slide 3</span>
                <span class="slide__caption--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam assumenda nostrum quisquam voluptatem consectetur dolore, necessitatibus doloribus temporibus, enim animi adipisci architecto ipsum, labore corporis! Quaerat doloribus consequatur ex blanditiis?</span>
            </div>
        </div>
        <div id="slide" class="slide" data-slide-id="3">
            <img class="slide__img" src="assist/image/banner4.jpg" alt="slider-3">
            <div class="slide__caption">
                <span class="slide__caption--title">Slide 4</span>
                <span class="slide__caption--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam assumenda nostrum quisquam voluptatem consectetur dolore, necessitatibus doloribus temporibus, enim animi adipisci architecto ipsum, labore corporis! Quaerat doloribus consequatur ex blanditiis?</span>
            </div>
        </div>
        <div id="slide" class="slide" data-slide-id="4">
            <img class="slide__img" src="assist/image/banner5.jpg" alt="slider-4">
            <div class="slide__caption">
                <span class="slide__caption--title">Slide 5</span>
                <span class="slide__caption--text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam assumenda nostrum quisquam voluptatem consectetur dolore, necessitatibus doloribus temporibus, enim animi adipisci architecto ipsum, labore corporis! Quaerat doloribus consequatur ex blanditiis?</span>
            </div>
        </div>
    </div>

    <a href="#" class="slider__btn slider__btn--prev" data-slide="prev">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
    </a>
    <a href="#" class="slider__btn slider__btn--next" data-slide="next">
        <i class="fa fa-chevron-right" aria-hidden="true"></i>
    </a>

    <div class="indicators">
        <ul class="indicators__list">
            <li class="indicators__item active" data-slide-to="0"></li>
            <li class="indicators__item" data-slide-to="1"></li>
            <li class="indicators__item" data-slide-to="2"></li>
            <li class="indicators__item" data-slide-to="3"></li>
            <li class="indicators__item" data-slide-to="4"></li>
        </ul>
    </div>
</section>

<br><br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="content bg-white shadow">
                Most popular products
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12" id="product_msg">
                </div>
                <?php
                $sql = "SELECT * FROM products ORDER BY product_views DESC LIMIT 4";
                $run_query = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($run_query)){
                    $pro_id    = $row['product_id'];
                    $pro_cat   = $row['product_cat'];
                    $pro_brand = $row['product_brand'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_image = $row['product_image'];
                    echo "
                                <div class='product col-md-3' style='margin-bottom: 20px;'>
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
                                            <div class='text'>
                                                <a href='product_details.php?selected_product_id=$pro_id' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i>view Detail</a>
                                                <a href='#' pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                                
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
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="content bg-white shadow">
                Most popular products for Mens
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12" id="product_msg">
                </div>
                <?php
                $sql = "SELECT * FROM products WHERE product_cat = '1' ORDER BY product_views DESC LIMIT 4";
                $run_query = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($run_query)){
                    $pro_id    = $row['product_id'];
                    $pro_cat   = $row['product_cat'];
                    $pro_brand = $row['product_brand'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_image = $row['product_image'];
                    echo "
                                <div class='product col-md-3' style='margin-bottom: 20px;'>
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
                                            <div class='text'>
                                                <a href='product_details.php?selected_product_id=$pro_id' target='_blank' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i>view Detail</a>
                                                <a href='#' pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                                
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
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="content bg-white shadow">
                Most popular Womens products
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12" id="product_msg">
                </div>
                <?php
                $sql = "SELECT * FROM products WHERE product_cat = '2' ORDER BY product_views DESC LIMIT 4";
                $run_query = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($run_query)){
                    $pro_id    = $row['product_id'];
                    $pro_cat   = $row['product_cat'];
                    $pro_brand = $row['product_brand'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_image = $row['product_image'];
                    echo "
                                <div class='product col-md-3' style='margin-bottom: 20px;'>
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
                                            <div class='text'>
                                                <a href='product_details.php?selected_product_id=$pro_id' target='_blank' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i>view Detail</a>
                                                <a href='#' pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                                
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
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="content bg-white shadow">
                Most popular Kids products
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-xs-12" id="product_msg">
                </div>
                <?php
                $sql = "SELECT * FROM products WHERE product_cat = '3' ORDER BY product_views DESC LIMIT 4";
                $run_query = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($run_query)){
                    $pro_id    = $row['product_id'];
                    $pro_cat   = $row['product_cat'];
                    $pro_brand = $row['product_brand'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_image = $row['product_image'];
                    echo "
                                <div class='product col-md-3' style='margin-bottom: 20px;'>
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
                                            <div class='text'>
                                                <a href='product_details.php?selected_product_id=$pro_id' target='_blank' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i>view Detail</a>
                                                <a href='#' pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                                
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

<?php
include 'views/footer.php';
?>

<?php
include 'views/scripts.php';
?>
</body>
</html>