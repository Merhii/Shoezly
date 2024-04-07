<?php
session_start();
include "config.php";

if (isset($_POST['product_id'])){
    $product_id = $_POST['product_id'];
    $_SESSION['id'] = $product_id;
    $cartHtml = generateCartHtml($_SESSION['id'], $conn);
    echo $cartHtml;
} else {
    echo 'Error: Missing product.';
}

function generateCartHtml($product_id, $conn) {
    $html = '';
    $totalPrice = 0;

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
        $totalPrice += $product['price'];
    }

    return $html . '|' . $totalPrice;
}