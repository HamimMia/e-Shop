<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:../index.php");
}
?>

<?php
    include "../db.php";
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
        <div class="content bg-white shadow">
            <p>Manage Brand</p>
        </div>
        <div class="bg-white shadow col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>Brand ID</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <?php

                $sql = ("SELECT * FROM brands ORDER BY brand_id ASC");
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)){
                    $brand_id = $row['brand_id'];
                    $brand_title = $row['brand_title'];


                    ?>
                                <tbody>
                                <tr>
                                    <form action="functions.php" method="post">
                                        <td><?php echo $row ["brand_id"] ?></td>
                                        <td><?php echo $brand_title ?></td>
                                        <td>
                                            <a href='brand_edit.php?brand_edit_id=<?php echo $row {'brand_id'}; ?>' class='btn btn-1'>
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
<!--                                            <input type="submit" name="update">-->
                                            <a href='functions.php?brand_delete_id=<?php echo $row {'brand_id'}; ?>' class='btn btn-1'>
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </form>

                                    <?php } ?>
                </tr>
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