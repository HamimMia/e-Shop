<nav class="sticky-top shadow">
<!--    <div id="logo"><a href="#"><img src="" alt=""></a></div>-->

    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="category_list.php">Categories</a></li>
        <li><a href="brand_list.php">Brands</a></li>
        <li><a href="product_list.php">Products</a></li>
        <li>
            <!-- First Tier Drop Down
            <a href="#">Products & Services</a>
            <input type="checkbox" id="drop-1"/>
            <ul>
                <li><a href="#">Themes and stuff</a></li>
                <li><a href="#">Plugins</a></li>
                <li><a href="#">Tutorials</a></li>
            </ul>-->
        </li>
        <li><a href="customer_orders.php">Customer Orders</a></li>

    </ul>
    <ul class="float-right" style="padding-right: 9.5%;">
        <li class='dropdown'>
            <?php
                include '../db.php';
                $sql= "SELECT * FROM user_info where user_id = '".$_SESSION['uid']."'";
                $result= mysqli_query($con, $sql);
                while ($row=mysqli_fetch_assoc($result)){
                    $email = $row['email'];

            ?>
            <a href="#" class='dropbtn'><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;<?php echo $email; ?><!-- &nbsp;<i class="fa fa-caret-down" aria-hidden="true"></i>--></a>
            <div class='dropdown-content'>
                <a href='view_profile.php'><i class="fa fa-eye" aria-hidden="true"> &nbsp;&nbsp;View Profile</i></a>
                <a href='edit_profile.php'><i class="fa fa-eye" aria-hidden="true"> &nbsp;&nbsp;Edit Profile</i></a>
                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"> &nbsp;&nbsp;Sigh out</i></a>
            </div>
            <?php
                }
            ?>
        </li>
    </ul>
</nav>
