<nav class="sticky-top shadow">
    <!--    <div id="logo"><a href="#"><img src="" alt=""></a></div>-->

    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="user_clotching.php">Shop now</a></li>
        <li>

            <!--            <a href="cart.php"><span class="glyphicon glyphicon-shopping-cart">Cart</a>-->
        </li>
        <li>
            <a href="customer_order.php">My Orders</a>
        </li>
        <li class='dropdown'>
            <?php
            include 'db.php';
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
    <div class="navbar-btn float-right">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <input type="search" name="search" placeholder="Search Names" id="search" class="search">
        <a class="btn btn-1" id="open_search"><i class="fa fa-search" aria-hidden="true"></i></a>
        <div id="here"></div>
        <script>
            $(document).ready(function(e) {
                $("#search").keyup(function() {
                    $("#here").show();
                    var x = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: 'search.php',
                        data: 'q=' + x,
                        success: function(data) {
                            $("#here").html(data);
                        },
                    });
                });
            });
            $(document).on('click', function (e) {
                if ($(e.target).closest("#here").length === 0) {
                    $("#here").hide();
                }
            });

        </script>

        <a href="user_cart.php" id="open-modal" class="btn btn-1">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
            <span class="badge cart-badge">0</span>
        </a>
    </div>
</nav>