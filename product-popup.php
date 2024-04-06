<?php
include "config.php";

if(isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $product_name = $row['product_name'];
    $price = $row['price'];
    $size = $row['shoe_size'];
    $quantity=$row['stock_quantity'];
    echo '<div class="shoe ' . $product_id . '">
            <img src="shoes_imgs/'.$row['imageURL'].'" alt="" />
          </div>
          <div class="popup-container">
            <h2 class="text-center">' . $product_name . '</h2>
            <div class="d-flex mb-2">
              <h5 class="me-4">Price:</h5>
              <h5>' . $price . '$</h5>
            </div>
            <div class="d-flex mb-2">
              <h5 class="me-5">Size:</h5>
             
                <h5>' . $size .'</h5>
             
            </div>
            <div class="d-flex mb-2">
              <h5 class="mb-0 me-2">Available quantity:</h5>
               <h5>' .$quantity.'</h5>
            </div>'
          
            ?>
            <?php
            if($quantity!=0){
            echo  '  <div class="add-to-cart-c text-center">
            <button class="add-to-cart">Add to Cart</button>';
            }else
          echo '<h4 class=out-of-stock>Product out of Stock</h4>';

        echo '</div>
            </div>
            <button class="close-popup-btn">&times;</button>
          </div>';
}

mysqli_close($conn);
?>
