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

            <table class="table">
                <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                </tr>
                </thead>
                <?php

                $sql = ("SELECT * FROM categories ORDER BY cat_id DESC");
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];


                    echo "
                <tbody>
                <tr id='cat_display'>
                    <td>$cat_id</td>
                    <td>$cat_title </td>
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