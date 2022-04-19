<?php

session_start();
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<?php
include 'views/head.php';
?>
<body>
<?php
    include 'views/nav.php';
?>
<p><br/></p>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class='bg-white shadow text-center' style="padding: 2%;">
                        <h3>Customer Order Details</h3>
                    </div>
                    <br>
                    <?php
                    include_once("config.php");
                    $user_id = $_SESSION["uid"];
                    $orders_list = "SELECT o.order_id,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,p.product_title,p.product_price,p.product_image, u.user_id, u.first_name, u.last_name, u.address1, u.address2 FROM orders o,products p, user_info u WHERE o.product_id=p.product_id AND o.user_id=u.user_id";
                    $query = mysqli_query($con,$orders_list);
                    if (mysqli_num_rows($query) > 0) {
                        while ($row=mysqli_fetch_array($query)) {
                            ?>
                            <div class="row">
                                <div class='product col-md-12' style='margin-bottom: 20px;'>
                                    <div class='bg-white shadow'>
                                        <br>
                                        <div class='text-center' style='width: 100%; margin: 0%;'>
                                            <h5>Transaction Details</h5>
                                            <hr>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src='../assist/product_images/<?php echo $row['product_image'];?>' alt='' class='' style="height: 350px; width: 300px;">
                                            </div>
                                            <div class="col-md-8">
                                                <table class="table table-responsive">
                                                    <tr><td>User ID</td><td><b><?php echo $row["user_id"]; ?></b> </td></tr>
                                                    <tr><td>User Name</td><td><b><?php echo $row["first_name"]." ".$row["last_name"]; ?></b> </td></tr>
                                                    <tr><td>User Address</td><td><b><?php echo $row["address1"].", ".$row["address2"]; ?></b> </td></tr>
                                                    <tr><td>Product Name</td><td><b><?php echo $row["product_title"]; ?></b> </td></tr>
                                                    <tr><td>Product Price</td><td><b><?php echo "$ ".$row["product_price"]; ?></b></td></tr>
                                                    <tr><td>Quantity</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
                                                    <tr><td>Transaction Id</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
                                                    <tr><td>Payment Status</td><td><b><?php echo $row["p_status"]; ?></b></td></tr>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>

                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
        <div class="col-md-2"></div>
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