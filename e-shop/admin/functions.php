<?php
    include '../db.php';

    if (isset($_POST['add_category'])){

        $cat_title = $_POST['cat_title'];
        if($cat_title==""){
            echo "Please Input A Category Title! To go back Click <a href='add_category.php'>HERE</a>";
        }else{
            $sql = ("INSERT INTO categories VALUES ('','$cat_title')");
            $result = mysqli_query($con, $sql);
            header("location: category_list.php");
        }
    }
    if (isset($_GET['cat_delete_id'])){
        $delete_id = $_GET['cat_delete_id'];
        $sql = ("DELETE FROM categories WHERE cat_id = $delete_id");
        $result = mysqli_query($con, $sql);
        header("location: category_manage.php");
    }
    if (isset($_POST['update_cat'])){
        $edit_id = $_GET['cat_edit_id'];
        $cat_title = $_POST['cat_title'];
        if ($cat_title != ''){
            $sql = "UPDATE categories SET cat_title='$cat_title' WHERE cat_id ='$edit_id'";
            $result = mysqli_query($con, $sql);
            if(!$result){
                echo "Failed to update!";
            }else{
                echo "<h3 style='color: green;'>Successfully updated</h3>";
            }
        }else{
            echo "<h3 style='color: red;'>Please insert a category title!</h3>";
        }
    }
if (isset($_POST['add_brand'])){
    $brand_title = $_POST['brand_title'];
    if($brand_title==""){
        echo "Please Input A Brand Title! To go back Click <a href='add_brand.php'>HERE</a>";
    }else{
        $sql = ("INSERT INTO brands VALUES ('','$brand_title')");
        $result = mysqli_query($con, $sql);
        header("location: brand_list.php");
    }
}
if (isset($_GET['brand_delete_id'])){
    $delete_id = $_GET['brand_delete_id'];
    $sql = ("DELETE FROM brands WHERE brand_id = $delete_id");
    $result = mysqli_query($con, $sql);
    header("location: brand_manage.php");
}
if (isset($_POST['update_brand'])){
    $edit_id = $_GET['brand_edit_id'];
    $brand_title = $_POST['brand_title'];

    if($brand_title==""){
        echo "Please Input A Brand Title!";
    }else{
        $sql = "UPDATE brands SET brand_title='$brand_title' WHERE brand_id ='$edit_id'";
        $result = mysqli_query($con, $sql);
        if(!$result){
            echo "Failed to update!";
        }else{
        }
    }
}
if (isset($_POST['add_product'])){
    $product_title = $_POST['product_title'];
    $filename = $_FILES["product_image"]["name"];
    $filetmp = $_FILES["product_image"]["tmp_name"];
    $filetype = $_FILES["product_image"]["type"];
    $filepath = "../assist/product_images/".$filename;
    move_uploaded_file($filetmp,$filepath);
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    //echo $product_title.$product_desc.$product_price.$product_cat.$product_brand.$filename;
    if($product_title==""){
        echo "Please Input A Product Title! To go back Click <a href='add_product.php'>HERE</a>";
    }else{
        $sql = "INSERT INTO products VALUES ('','$product_cat', '$product_brand', '$product_title','$product_price', '$product_desc', '$filename','0')";
        $result = mysqli_query($con,$sql);
        header("location: product_list.php");
    }
}
if (isset($_GET['product_delete_id'])){
    $delete_id = $_GET['product_delete_id'];
    $sql = ("DELETE FROM products WHERE product_id = $delete_id");
    $result = mysqli_query($con, $sql);
    header("location: product_manage.php");
}
if (isset($_POST['update_product'])){
    $product_edit_id = $_GET['product_edit_id'];
    $product_title = $_POST['product_title'];
    $filename = $_FILES["product_image"]["name"];
    $filetmp = $_FILES["product_image"]["tmp_name"];
    $filetype = $_FILES["product_image"]["type"];
    $filepath = "../assist/product_images/".$filename;
    move_uploaded_file($filetmp,$filepath);
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    if($product_title==""){
        echo "Please Input A Product Title! To go back Click <a href='add_product.php'>HERE</a>";
    }else{
        $sql = "UPDATE products SET product_title ='$product_title', product_image = '$filename', product_desc ='$product_desc', product_price ='$product_price',
                product_cat = '$product_cat', product_brand = '$product_brand'
                WHERE
                product_id = '$product_edit_id'";
        $result = mysqli_query($con,$sql);
    }
}
?>