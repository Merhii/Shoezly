<?php
session_start();
include "config.php";

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    if (!isset($_SESSION['cart_items'])) {
        $_SESSION['cart_items'] = array();
    }

    $product_id = mysqli_real_escape_string($conn, $product_id);

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['cart_items'][] = $product_id;
        echo 'Product added to cart successfully.';
    } else {
        echo 'Error: Product not found.';
    }
} else {
    echo 'Error: Missing product.';
}
?>
