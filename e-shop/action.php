<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if (isset($_POST['update_profile'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];

    $sql="UPDATE user_info SET first_name = '$first_name', last_name = '$last_name', email = '$email', mobile = '$contact', address1 = '$address1', address2 = '$address2'";
    $result = mysqli_query($con, $sql);
    header("location: view_profile.php");
}

if(isset($_POST["category"])){
    $category_query = "SELECT * FROM categories";
    $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $cid = $row["cat_id"];
            $cat_name = $row["cat_title"];
            echo "
					<!--<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>-->
					<a  cid='$cid' class='side-bar-link category'>
                        <div class='side-bar-content'>
                            $cat_name
                        </div>
                    </a>
			";
        }
    }
}
if(isset($_POST["brand"])){
    $brand_query = "SELECT * FROM brands";
    $run_query = mysqli_query($con,$brand_query);
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $bid = $row["brand_id"];
            $brand_name = $row["brand_title"];
            echo "
					<!--<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>-->
					<a bid='$bid' class='side-bar-link selectBrand' id='womens_clothing'>
                        <div class='side-bar-content'>
                             $brand_name
                        </div>
                    </a>
					
			";
        }
    }
}
if(isset($_POST["page"])){
    $sql = "SELECT * FROM products";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count/12);
    for($i=1;$i<=$pageno;$i++){
        echo "
            <a href='#' page='$i' id='page' class='pageno-box'>$i</a>&nbsp;&nbsp;
		";
    }
}
if(isset($_POST["getProduct"])){
    $limit = 12;
    if(isset($_POST["setPage"])){
        $pageno = $_POST["pageNumber"];
        $start = ($pageno * $limit) - $limit;
    }else{
        $start = 0;
    }
    $product_query = "SELECT * FROM products LIMIT $start,$limit";
    $run_query = mysqli_query($con,$product_query);
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $pro_id    = $row['product_id'];
            $pro_cat   = $row['product_cat'];
            $pro_brand = $row['product_brand'];
            $pro_title = $row['product_title'];
            $pro_price = $row['product_price'];
            $pro_image = $row['product_image'];
            if(isset($_SESSION["uid"])) {

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
                        <img src='assist/product_images/$pro_image' alt='' class='img-responsive'>
                        <div style='margin-top: 5%;'>
                            <div class='text'>
                                <a href='user_product_details.php?selected_product_id=$pro_id' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i> view Detail</a>
                                &nbsp;&nbsp;&nbsp;<a pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
			";
            }else{
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
                        <img src='assist/product_images/$pro_image' alt='' class='img-responsive'>
                        <div style='margin-top: 5%;'>
                            <div class='text'>
                                <a href='product_details.php?selected_product_id=$pro_id' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i> view Detail</a>
                                &nbsp;&nbsp;&nbsp;<a pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
			";
            }
        }
    }
}
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
    if(isset($_POST["get_seleted_Category"])){
        $id = $_POST["cat_id"];
        $sql = "SELECT * FROM products WHERE product_cat = '$id'";
    }else if(isset($_POST["selectBrand"])){
        $id = $_POST["brand_id"];
        $sql = "SELECT * FROM products WHERE product_brand = '$id'";
    }else {
        $keyword = $_POST["keyword"];
        $sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
    }

    $run_query = mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($run_query)){
        $pro_id    = $row['product_id'];
        $pro_cat   = $row['product_cat'];
        $pro_brand = $row['product_brand'];
        $pro_title = $row['product_title'];
        $pro_price = $row['product_price'];
        $pro_image = $row['product_image'];

        if(isset($_SESSION["uid"])) {

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
                        <img src='assist/product_images/$pro_image' alt='' class='img-responsive'>
                        <div style='margin-top: 5%;'>
                            <div class='text'>
                                <a href='user_product_details.php?selected_product_id=$pro_id' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i> view Detail</a>
                                &nbsp;&nbsp;&nbsp;<a pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
			";
        }else{
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
                        <img src='assist/product_images/$pro_image' alt='' class='img-responsive'>
                        <div style='margin-top: 5%;'>
                            <div class='text'>
                                <a href='product_details.php?selected_product_id=$pro_id' class='btn btn-1 text-center' style=''><i class='fa fa-search' aria-hidden='true'></i> view Detail</a>
                                &nbsp;&nbsp;&nbsp;<a pid='$pro_id' id='product' class='btn btn-1 text-center' style=''><i class='fa fa-shopping-cart' aria-hidden='true'></i> Add to cart</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
			";
        }
    }
}



if(isset($_POST["addToCart"])){
    $p_id = $_POST["proId"];
    if(isset($_SESSION["uid"])){
        $user_id = $_SESSION["uid"];
        $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
        $run_query = mysqli_query($con,$sql);
        $run_query2 = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);
        if($count > 0){
            while ($row111=mysqli_fetch_assoc($run_query2)){
                $sql111 = ("update cart set qty = '".$row111['qty']."' + 1 WHERE p_id = $p_id AND  user_id = '$user_id'");
                $run_query = mysqli_query($con, $sql111);
                if(mysqli_query($con,$sql111)) {
                    echo "
                        Product quantity has been updated successfully..!
                    ";//not in video
                    /*echo "
                        <div class='alert alert-success'>
                                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                <b>Product quantity has been updated successfully..!</b>
                        </div>
                    ";*/
                }
            }
        } else {
            $sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`)
			VALUES ('$p_id','$ip_add','$user_id','1')";
            if(mysqli_query($con,$sql)){
                echo "
                    Product is Added..!
				";
            }
        }
    }else{
        $sql = "SELECT * FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
        $run_query = mysqli_query($con,$sql);
        $run_query2 = mysqli_query($con,$sql);
        $count = mysqli_num_rows($run_query);

        if($count > 0){

            while ($row111=mysqli_fetch_assoc($run_query2)){

                $sql111 = ("update cart set qty = '".$row111['qty']."' + 1 WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1 ");
                $run_query = mysqli_query($con, $sql111);
                if(mysqli_query($con,$sql111)) {
                    echo "
                        Product quantity has been updated successfully..!
                    ";
                }
            }
        } else {
            $sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`)
			VALUES ('$p_id','$ip_add','-1','1')";
            if(mysqli_query($con,$sql)){
                echo "
                    Product is Added..!
				";
                /*echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";*/
            }
        }

        /*$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
        $query = mysqli_query($con,$sql);
        if (mysqli_num_rows($query) > 0) {
            echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
            exit();
        }
        $sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
        if (mysqli_query($con,$sql)) {
            echo "
					<div class='alert alert-success' id='alert'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
            exit();
        }*/

    }
}

//Count User cart item
if (isset($_POST["count_item"])) {
    //When user is logged in then we will count number of item in cart by using user session id
    if (isset($_SESSION["uid"])) {
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
    }else{
        //When user is not logged in then we will count number of item in cart by using users unique ip address
        $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
    }

    $query = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($query);
    echo $row["count_item"];
    exit();
}
//Count User cart item

//Get Cart Item From Database
if (isset($_POST["Common"])) {

    if (isset($_SESSION["uid"])) {
        //When user is logged in this query will execute
        $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
    }else{
        //When user is not logged in this query will execute
        $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
    }
    $query = mysqli_query($con,$sql);
    if (isset($_POST["getCartItem"])) {
        //display cart item in dropdown menu
        if (mysqli_num_rows($query) > 0) {
            $n=0;
            while ($row=mysqli_fetch_array($query)) {
                $n++;
                $product_id = $row["product_id"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_image = $row["product_image"];
                $cart_item_id = $row["id"];
                $qty = $row["qty"];
                echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" style="width: 50px; height: 50px;" src="assist/product_images/'.$product_image.'" ></div>
						<div class="col-md-3">'.$product_title.'</div>
						<div class="col-md-3">$'.$product_price.'</div>
					</div>';

            }
            ?>
            <a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
            <?php
            exit();
        }
    }
    if (isset($_POST["checkOutDetails"])) {
        if (mysqli_num_rows($query) > 0) {
            //display user cart item with "Ready to checkout" button if user is not login
            echo "<form method='post' action='login_form.php'>";
            $n=0;
            while ($row=mysqli_fetch_array($query)) {
                $n++;
                $product_id = $row["product_id"];
                $product_title = $row["product_title"];
                $product_price = $row["product_price"];
                $product_image = $row["product_image"];
                $cart_item_id = $row["id"];
                $qty = $row["qty"];
                echo
                    '<div class="row" id="load_cart_products">
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2" style="margin-top: 25px;"><img class="img-responsive" style="width: 100px; height: 100px;" src="assist/product_images/'.$product_image.'"></div>
								<div class="col-md-2" style="margin-top: 45px;">'.$product_title.'</div>
								<div class="col-md-2" style="margin-top: 40px;"><input type="number" parseFloat() min="1" max="15" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2" style="margin-top: 40px;"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2" style="margin-top: 40px;"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2 text-center" style="margin-top: 40px;">
									<div class="btn-group">
										<a href="#" update_id="'.$product_id.'" class="btn btn-info update"><i class="fa fa-check" aria-hidden="true"></i>
										<br>Update
										</a>
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i>
										<br>Delete</a>
									</div>
								</div>
							</div><br><hr>';
            }
            echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
            if (!isset($_SESSION["uid"])) {
                echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Checkout now" >
							</form>';

            }else if(isset($_SESSION["uid"])){
                //Paypal checkout form
                echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
						<!--<input type="hidden" name="business" value="shoppingcart@khanstore.com">-->
							<input type="hidden" name="business" value="my-online-shopping@gmail.com">
							<input type="hidden" name="upload" value="1">';

                $x=0;
                $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
                $query = mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($query)){
                    $x++;
                    echo
                        '<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
                }

                echo
                    '<input type="hidden" name="return" value="http://localhost/e-shop/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/e-shop/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/e-shop/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
								</form>';
            }
        }
    }
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
    $remove_id = $_POST["rid"];
    if (isset($_SESSION["uid"])) {
        $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
    }else{
        $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
    }
    if(mysqli_query($con,$sql)){
        echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
        exit();
    }
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
    $update_id = $_POST["update_id"];
    $qty = $_POST["qty"];
    if (isset($_SESSION["uid"])) {
        $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
    }else{
        $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
    }
    if(mysqli_query($con,$sql)){
        echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
        exit();
    }
}


?>
