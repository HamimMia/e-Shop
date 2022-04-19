<nav class="sticky-top shadow">
    <!--    <div id="logo"><a href="#"><img src="" alt=""></a></div>-->

    <label for="drop" class="toggle">Menu</label>
    <input type="checkbox" id="drop" />
    <ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="clothing.php">Shop now </a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <!--<li class='dropdown'>
            <a href="#" class='dropbtn'>Departments</a>
            <div class='dropdown-content'>
                <?php
/*                    include 'db.php';
                    $category_query = "SELECT * FROM categories";
                    $run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
                    if(mysqli_num_rows($run_query) > 0){
                        while($row = mysqli_fetch_array($run_query)){
                            $cid = $row["cat_id"];
                            $cat_name = $row["cat_title"];
                            echo "
                                  <a href='#' cid='$cid' class='category'>$cat_name</a>
                                ";
                        }
                    }
                */?>
            </div>
        </li>-->
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

        <a href="cart.php" id="open-modal" class="btn btn-1">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;
            <span class="badge cart-badge">0</span>
        </a>
        <!--<div id="modal" class="modal table-responsive">
            <div class="modal-content" id="modal-content">
                <span class="button display-topright" id="modal-close">&times;</span>
                <div class="">
                    <p class="modal-header text-center">Update or Delete product from cart</p>
                </div>
                <div class="row">
                    <div class="panel-body" style="width: 80%; padding-left: 10%;">
                        <div class="row">
                            <div class="col-md-2 text-center"><b>Action</b></div>
                            <div class="col-md-2 "><b>Product Image</b></div>
                            <div class="col-md-2 "><b>Product Name</b></div>
                            <div class="col-md-2 "><b>Quantity</b></div>
                            <div class="col-md-2 "><b>Product Price</b></div>
                            <div class="col-md-2 "><b>Total Price</b></div>
                        </div>
                        <br><br>
                        <div id="cart_checkout"></div>
                    <!--<div class="col-md-5">
                        <a href="../assist/images/product1.jpg" target="_blank">
                            <img src="../assist/images/product1.jpg" alt="" class="modal-img">
                        </a>
                    </div>
                    <div class="col-md-7">
                        <br>
                        <table>
                            <tr>
                                <td>
                                    Product Title
                                </td>
                                <td>
                                    &nbsp; : &nbsp;
                                </td>
                                <td>
                                    Shirt
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Product Color
                                </td>
                                <td>
                                    &nbsp; : &nbsp;
                                </td>
                                <td>
                                    White | Black | Blue | Red
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Product Size
                                </td>
                                <td>
                                    &nbsp; : &nbsp;
                                </td>
                                <td>
                                    30 | 40 | 50 | 60
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Product Price
                                </td>
                                <td>
                                    &nbsp; : &nbsp;
                                </td>
                                <td>
                                    $1000
                                </td>
                            </tr>
                        </table>
                        <div class="">
                            <button class="btn modal-btn text-center"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</button>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>


</nav>
<!--<div class="row bg-white big-search" id="search-div">
    <div class="col-md-11 search">
        <input type="search" name="search" placeholder="Search Names" id="search" class="form-control" style="width: 100%;">
    </div>
    <div class="col-md-1">
        <a href="" class="btn btn-1">Search</a>
    </div>
</div>-->