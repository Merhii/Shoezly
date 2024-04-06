<?php
include "config.php";

session_start();

$id = $_GET['id'];
$sqlproduct = "SELECT products.* FROM products WHERE product_id = '$id'";
$resultproduct = mysqli_query($conn, $sqlproduct);
$resultproduct = $resultproduct->fetch_assoc();

$sqlbrand = "SELECT * FROM Brand";
$resultbrand = mysqli_query($conn, $sqlbrand);

// $sqlcategory = "SELECT * FROM category";
// $resultcategory = mysqli_query($conn, $sqlcategory);


?>

<!DOCTYPE html>
<html>

<head>
    <link href="admin.css" rel="stylesheet">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h2>Edit Item </h2>

    <a href="index.php">Back</a>
        <form action="/admin/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $resultproduct['product_id'] ?>">

            <img src="/shoes_imgs/<?= $resultproduct['imageURL'] ?>" alt="">
            <input type="file" name="image"><br><br>

            Name: <input type="text" name="name" value="<?= $resultproduct['product_name'] ?>" required><br><br>

            Size: <input type="text" name="Size" value="<?= $resultproduct['shoe_size'] ?>" required><br><br>

            Description: <textarea name="description"> <?= $resultproduct['description'] ?> </textarea><br><br>

            Brand: <br><br>
            <select id="Brand" class="form-select" name="Brand">
                <?php
                while ($rowbrand = mysqli_fetch_assoc($resultbrand)) {
                    echo "<option" . ($resultproduct['brand_id'] == $rowbrand['brand_id']) ? "selected" : "" . " value=" . $rowbrand['brand_id'] . ">" . $rowbrand['brand_name'] . "</option>";
                }
                ?>
            </select><br><br>

            Price: <input type="text" name="Price" value="<?= $resultproduct['price'] ?>" required><br><br>

            Category: <br><br>
            <select id="Cat" class="form-select" name="Cat">

            </select><br><br>

            Stock: <input type="text" name="Stock" value="<?= $resultproduct['stock_quantity'] ?>" required><br><br>

            Gender: <br><br>
            <select id="genders" class="form-select" name="gender">
            </select><br><br>

            <input type="submit" value="Save Changes" name="submit">
        </form>
        <script src="admin.js"></script>

</body>

</html>