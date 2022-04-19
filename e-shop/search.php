<?php
if(!empty(($_GET['q']))){
    include 'db.php';
    $q=$_GET['q'];
    $query="SELECT * FROM products WHERE product_title like '%$q%'";
    $result=mysqli_query($con,$query);
    while ($output=mysqli_fetch_assoc($result)){
        $pro_id = $output['product_id'];


        echo "<div class='search-result'". $output['product_title'] ."&nbsp;(".")"."'>";?>

                <a href='product_details.php?selected_product_id=<?php echo $pro_id ?>' pid='<?php echo $pro_id ?>'>

        <?php echo "<img height='50px' width='50px' src='assist/product_images/". $output['product_image'] ."' alt=''>
                    &nbsp;" . $output['product_title']. "&nbsp;&nbsp;&nbsp;$".$output['product_price']
                ."</a>
             </div>
             <br>
         ";
    }
}
?>