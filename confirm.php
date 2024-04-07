<?php
session_start(); // Start the session

if (!empty($_SESSION['order_info'] && !empty($_SESSION['lat']))) {
    $orderDetails = explode('<br>', $_SESSION['order_info']);


    // echo $_SESSION['order_info'];
    // echo $_SESSION['lat'];
    // echo $_SESSION['lng'];
    $orderDetails[0]; // User Name
    $orderDetails[1]; // Product ID
    $orderDetails[2]; // Product Name
    $orderDetails[3]; // Quantity
    $orderDetails[4]; // Total
    $orderDetails[5]; // Total Bill
    //Query 1: jeeb l customer id

    $sql1 = "SELECT customer_id FROM customers WHERE first_name = ".$orderDetails[0].";"
    $result = $conn->query($sql1);
    $customer = $result->fetch_assoc();

    $today = date('Y-m-d');
 
    // Query 2: Insert into orders
$sql2 = "INSERT INTO orders(customer_id, order_date, order_status, total_amount) VALUES (".$customer.",'$today', 'pending', ". $orderDetails[5].")";
$conn->query($sql2);

//query 3;jeev l order id for relation
$sql3="SELECT order_id FROM orders WHERE order_date= ".$today." ";
$conn->query($sql3);
$order_id = mysqli_query($conn, $sql3);


// kweryuery 4: Insert into order_details
$sql4 = "INSERT INTO order_details(order_id, product_id, quantity, price) VALUES (".$order_id.", ".$orderDetails[1].", ".$orderDetails[3].", ".$orderDetails[4].")";
$conn->query($sql4);

// kweze 5 : Shipmannrt
$sqll = "INSERT INTO shipments(order_id, shipment_status, tracking_number, estimated_delivery) VALUES (".$order_id.", 'pending', 'xyz', 'abc')";
$conn->query($sqll);

// Query 5: Update products
$sql67= "UPDATE products SET stock_quantity = stock_quantity - ".$orderDetails[3]." WHERE product_id = ".$orderDetails[1]."";
$conn->query($sql67);

$conn->close();

} 
else {
    
    echo "No order information available.";
}
?>
