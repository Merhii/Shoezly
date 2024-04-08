<?php
session_start();
if(isset($_SESSION['cart_items'])) {
    $cartItems = $_SESSION['cart_items'];
    $productCount = count($cartItems);
    echo $productCount;
} else {
    echo 0;
}
?>
