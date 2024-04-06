<?php

include "config.php";

session_start();

$id = $_GET['id'];
$sqlproduct = "SELECT products.* FROM products WHERE product_id = '$id'";
$resultproduct = mysqli_query($conn, $sqlproduct);
$resultproduct = $resultproduct->fetch_assoc()
?>

<!DOCTYPE html>
<html>

<head>
    <link href="/resource/css/admin.css" rel="stylesheet">
    <title>View Shoe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <a href="index.php">Back</a>
    <div>
        <img src="../shoes_imgs/<?php echo $resultproduct['imageURL'] ?>" alt="" />
        <div>ID: <?php echo $id ?></div>
        <div>Name: <?php echo $resultproduct['product_name'] ?></div>
        <div>Price: <?php echo $resultproduct['price'] ?></div>
        <div>Brand: <?php echo $resultproduct['Brand'] ?></div>
    </div>
</body>

</html>