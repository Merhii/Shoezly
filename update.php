<?php
session_start();
include 'config.php';

if (isset($_POST["submit"])) {

    // Get shoe data
    $id = $_POST["id"];
    $name = $_POST["name"];
    $size = $_POST["Size"];
    $description = $_POST["description"];
    $brand = $_POST["Brand"];
    $price = $_POST["Price"];
    $category = $_POST["Cat"];
    $stock = $_POST["Stock"];
    $gender = $_POST["gender"];
    
    $sql = "UPDATE products SET product_name=?, shoe_size=?, description=?, Brand=?, price=?, category=?, stock_quantity=?, gender=? WHERE product_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $name, $size, $description, $brand, $price, $category, $stock, $gender, $id);
    if ($stmt->execute()) {
        header("Location:admin.php");
    } else {
        $_SESSION["message"] = array(
            "text" => "Error: " . $sql . "<br>" . $conn->error,
            "timestamp" => time() // Store the current timestamp
        );
    }
    $stmt->close();

}
