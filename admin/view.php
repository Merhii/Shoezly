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
    <link href="admin.css" rel="stylesheet">
    <title>View Shoe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <a href="index.php" class="btn btn-primary mb-3" >Back</a>
    <h2 class="text-center mb-5">View Product </h2>
    <div>
        <img class="mb-4" style="width: 30%;" src="../shoes_imgs/<?php echo $resultproduct['imageURL'] ?>" alt="" />
        <div>ID: <?php echo $id ?></div>
        <div>Name: <?php echo $resultproduct['product_name'] ?></div>
        <div>Price: <?php echo $resultproduct['price'] ?></div>
        <div>Brand: <?php echo $resultproduct['Brand'] ?></div>
    </div>
</body>

</html>