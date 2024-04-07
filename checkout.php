<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cartItemsJson = $_POST["cartItems"];
    
    
    $cartItemsArray = json_decode($cartItemsJson, true);

    // Process the data
    // For example, you can iterate through the array and display the cart items
    if (!empty($cartItemsArray)) {
        echo "<h2>Cart Items:</h2>";
foreach ($cartItemsArray as $productId) {
    echo "Product ID: " . $productId . "<br>";
}

    } else {
        echo "No items in the cart.";
    }
} else {
    // If the form was not submitted, handle the case accordingly
    echo "Form was not submitted.";
}
?>
