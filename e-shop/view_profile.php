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
include "views/reg_user_nav.php";
?>
<p><br/></p>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <?php
                    include_once("db.php");
                    $user_id = $_SESSION["uid"];
                    $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
                    $result = mysqli_query($con,$sql);

                        while ($row=mysqli_fetch_array($result)) {
                            ?>
                            <div class="row">
                                <div class='product col-md-12' style='margin-bottom: 20px;'>
                                    <div class='bg-white shadow'>
                                        <div class='text-center' style='width: 100%; margin: 0%;'>
                                            <br>
                                            <h5 class="text-center">My profile</h5>
                                            <hr/>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-10 offset-md-1">
                                                <table class="table table-responsive">
                                                    <tr><td>First Name</td><td><b><?php echo $row["first_name"]; ?></b> </td></tr>
                                                    <tr><td>Last Name</td><td><b><?php echo $row["last_name"]; ?></b></td></tr>
                                                    <tr><td>Email</td><td><b><?php echo $row["email"]; ?></b></td></tr>
                                                    <tr><td>Contact no.</td><td><b><?php echo $row["mobile"]; ?></b></td></tr>
                                                    <tr><td>Address 1</td><td><b><?php echo $row["address1"]; ?></b></td></tr>
                                                    <tr><td>Address 2</td><td><b><?php echo $row["address2"]; ?></b></td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
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