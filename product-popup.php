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
    echo '<div class="shoe">
            <img src="shoes_imgs/'.$row['imageURL'].'" alt="" />
          </div>
          <div class="popup-container">
            <h2>' . $product_name . '</h2>
            <div class="d-flex mb-1">
              <h5 class="me-5">Price:</h5>
              <h5>' . $price . '$</h5>
            </div>
            <div class="d-flex size">
              <h5>Size:</h5>
              <div class="sizes">
                <div class="size-box">' . $size .'</div>"
              </div>
            </div>
            <div class="d-flex">
              <h5 class="mb-0 me-2">Quantity:</h5>
              <input type="number" name="quantity" value="1" />
            </div>
            <div class="add-to-cart-c text-center">
              <button class="add-to-cart">Add to Cart</button>
            </div>
            </div>
            <button class="close-popup-btn">&times;</button>
          </div>';
}

mysqli_close($conn);
?>
