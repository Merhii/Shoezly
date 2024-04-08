<?php
session_start();
include 'config.php';

if(isset($_SESSION['cid'])){
    $customerID = $_SESSION['cid'];
}

if (isset($_SESSION['cart-toPurchase'])) {
    $cartItems = $_SESSION['cart-toPurchase'];
    if(isset($_SESSION['Bill'])){
        $Bill = $_SESSION['Bill'];
        $today = date('Y-m-d');
        $sql1 = "INSERT INTO orders(customer_id, order_date, order_status, total_amount) VALUES ('$customerID', '$today', 'pending', $Bill)";
        $conn->query($sql1);
        $order_id = mysqli_insert_id($conn);
        foreach ($cartItems as $item) {
            $productId =  $item['productId'];
            $quantity =$item['quantity'];
            $total = $item['total'];

            $sql2 = "INSERT INTO order_details(order_id, product_id, quantity, price) VALUES ($order_id, '$productId', '$quantity', '$total')";
            $conn->query($sql2);

            $sql3 = "UPDATE products SET stock_quantity = stock_quantity - $quantity WHERE product_id = '$productId'";
            $conn->query($sql3);
        }
    }
    unset($_SESSION['cart-toPurchase']);
    unset($_SESSION['Bill']);
    unset($_SESSION['cart_items']);
} else {
    echo "Cart is empty.";
}
$conn->close();
