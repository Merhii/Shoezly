<?php
include "config.php";

if(isset($_POST['product_id']) && isset($_POST['itemCount'])) {
    $itemCount = $_POST['itemCount'];
    $product_id = $_POST['product_id'];
    $sql = "SELECT * FROM products WHERE product_id = $product_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $quantity = $row['stock_quantity'];

    if($quantity == $itemCount + 1) {
        echo '<h4 class="added-to-cart">Added to Cart</h4>';
        echo '<h4 class="out-of-stock">Product out of Stock</h4>';
    }
    elseif ($quantity > $itemCount) {
        echo '<h4 class="added-to-cart">Added to Cart</h4>';
    }
}

mysqli_close($conn);