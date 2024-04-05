<?php
session_start();
include "config.php";

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$product_id] = $quantity;
    $cartHtml = generateCartHtml($_SESSION['cart'], $conn); // Pass $conn as an argument
    echo $cartHtml;
} else {
    echo 'Error: Missing product ID or quantity.';
}

// Function to generate cart HTML
function generateCartHtml($cart, $conn) { // Add $conn as a parameter
    $html = '';
    foreach ($cart as $product_id => $quantity) {
        // Fetch product details from the database
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Display the product details in the cart item
        if ($product = $result->fetch_assoc()) { // Fetch the product details
            $html .= '<div class="item">
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
    }
    echo $html;
}
?>
