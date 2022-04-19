<?php
session_start();
if(!isset($_SESSION["uid"])){
    header("location:index.php");
}
include 'config.php';
$user_id = $_SESSION["uid"];
if (isset($_POST['update_profile'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];

    $sql="UPDATE user_info SET first_name = '$first_name', last_name = '$last_name', email = '$email', mobile = '$contact', address1 = '$address1', address2 = '$address2' 
            WHERE 
          user_id = $user_id";
    $result = mysqli_query($con, $sql);
    header("location: view_profile.php");
}
?>
<!DOCTYPE html>
<html>
<?php
include 'views/head.php';
?>
<body>
<?php
include "views/nav.php";
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
                    include_once("config.php");
                    $user_id = $_SESSION["uid"];
                    $sql = "SELECT * FROM user_info WHERE user_id='$user_id'";
                    $result = mysqli_query($con,$sql);

                    while ($row=mysqli_fetch_array($result)) {
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class='col-md-12' style='margin-bottom: 20px;'>
                                    <div class='bg-white shadow'>
                                        <div class='text-center' style='width: 100%; margin: 0%;'>
                                            <br>
                                            <h5 class="text-center">Edit profile</h5>
                                            <hr/>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 offset-md-1">
                                                First Name
                                            </div>
                                            <div class="col-md-7">
                                                <b><input type="text"name="first_name" class="form-control" value="<?php echo $row["first_name"]; ?>"></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 offset-md-1">
                                                Last Name
                                            </div>
                                            <div class="col-md-7">
                                                <b><input type="text"name="last_name" class="form-control" value="<?php echo $row["last_name"]; ?>"></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 offset-md-1">
                                                Email
                                            </div>
                                            <div class="col-md-7">
                                                <b><input type="text"name="email" class="form-control" value="<?php echo $row["email"]; ?>"></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 offset-md-1">
                                                Contact no.
                                            </div>
                                            <div class="col-md-7">
                                                <b><input type="text"name="contact" class="form-control" value="<?php echo $row["mobile"]; ?>"></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 offset-md-1">
                                                Address 1
                                            </div>
                                            <div class="col-md-7">
                                                <b><input type="text"name="address1" class="form-control" value="<?php echo $row["address1"]; ?>"></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3 offset-md-1">
                                                Address 2
                                            </div>
                                            <div class="col-md-7">
                                                <b><input type="text"name="address2" class="form-control" value="<?php echo $row["address2"]; ?>"></b>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <input type="submit"name="update_profile" class="btn btn-1 form-control" value="Update Profile">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </form>

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