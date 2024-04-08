<?php
session_start();
include "config.php";

if (isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items'])) {
    $cartHtml = '';
    $totalPrice = 0;
    foreach ($_SESSION['cart_items'] as $product_id) {
        $product_id = mysqli_real_escape_string($conn, $product_id);
        $cartHtml .= generateCartHtml($product_id, $conn);
    }

    echo $cartHtml;
} else {
    echo 'Your cart is empty.';
}

function generateCartHtml($product_id, $conn) {
    $html = '';
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($product = $result->fetch_assoc()) {
        $html .= '<div class="item ' . $product_id . '">
                        <div class="image">
                            <img src="shoes_imgs/'.$product['imageURL'].'">
                        </div>
                        <div class="name">' . $product['product_name'] . '</div>
                        <div class="totalPrice">' . $product['price'] . '$</div>
                        <div class="remove">
                            <button>&times;</button>
                        </div>
                    </div>';
    }

    return $html;
}