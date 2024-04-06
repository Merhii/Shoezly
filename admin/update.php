<?php
session_start();
include 'config.php';

$basePath = dirname(__DIR__);

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
    $imageTmpName = $_FILES["image"]["tmp_name"];
    $imageType = $_FILES["image"]["type"];

    // Generate a unique filename based on the user's input
    $imageExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $imageName = $name . '.' . $imageExtension;

    $targetDir = $basePath . "\\shoes_imgs\\";
    $targetFile = $targetDir . $imageName;

    //debug
    $debugMessage = "Temporary File Name: " . $imageTmpName . "<br>" . "Target File: " . $targetFile . "<br>";

    if (move_uploaded_file($imageTmpName, $targetFile)) {

        $sql = "UPDATE products (product_name, shoe_size, description, Brand, price, category, imageURL, stock_quantity, gender) VALUES ($name,$size,$description,$brand,$price,$category,$imageName,$stock,$gender) WHERE product_id = $name";
        if ($conn->query($sql) === true) {
            $_SESSION["message"] = array(
                "text" => "Image uploaded successfully.",
                "timestamp" => time() // Store the current timestamp
            );
        } else {
            $_SESSION["message"] = array(
                "text" => "Error: " . $sql . "<br>" . $conn->error,
                "timestamp" => time() // Store the current timestamp
            );
        }
    } else {
        $_SESSION["message"] = array(
            "text" => "Error uploading image.",
            // "timestamp" => time(),
            "debug" => $debugMessage
        );
    }
    header("Location:index.php");
    exit();
}
