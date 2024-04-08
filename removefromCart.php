<?php
session_start();

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (($key = array_search($product_id, $_SESSION['cart_items'])) !== false) {
        unset($_SESSION['cart_items'][$key]);
        echo 'Item removed from session.';
    } else {
        echo 'Error: Item not found in session.';
    }
} else {
    echo 'Error: No item ID provided.';
}
?>