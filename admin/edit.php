<?php
include "config.php";

session_start();

$id = $_GET['id'];
$sqlproduct = "SELECT products.* FROM products WHERE product_id = '$id'";
$resultproduct = mysqli_query($conn, $sqlproduct);
$resultproduct = $resultproduct->fetch_assoc();

// fetch brand names from brand
$sqlbrand = "SELECT * FROM Brand";
$resultbrand = mysqli_query($conn, $sqlbrand);

// Fetch distinct categories from the products table
$sqlcategories = "SELECT DISTINCT category FROM products";
$resultcategories = mysqli_query($conn, $sqlcategories);

// Fetch distinct genders from the products table
$sqlgenders = "SELECT DISTINCT gender FROM products";
$resultgenders = mysqli_query($conn, $sqlgenders);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="admin.css" rel="stylesheet">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h2 class="text-center">Edit Product </h2>

    <a href="index.php" class="mb-3 btn btn-primary">Back</a>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $resultproduct['product_id'] ?>">

            Name: <br><br>
            <input type="text" name="name" value="<?= $resultproduct['product_name'] ?>" required><br><br>

            Size: <br><br>
            <input type="text" name="Size" value="<?= $resultproduct['shoe_size'] ?>" required><br><br>

            Description: <textarea name="description"> <?= $resultproduct['description'] ?> </textarea><br><br>

            Brand:<br><br>
           
            <select id="Brand" class="form-select" name="Brand">
                <?php
               
                while ($rowbrand = mysqli_fetch_assoc($resultbrand)) {
                    $selected = ($resultproduct['Brand'] == $rowbrand['Brand_Name']) ? "selected='selected'" : "";
                    echo "<option $selected value='" . $rowbrand['Brand_Name'] . "'>" . $rowbrand['Brand_Name'] . "</option>";
                }
                ?>
            </select><br><br>

            Price: <br><br>
            <input type="text" name="Price" value="<?= $resultproduct['price'] ?>" required><br><br>

            Category: <br><br>
            <select id="Cat" class="form-select" name="Cat">
            <?php
                while ($rowcategory = mysqli_fetch_assoc($resultcategories)) {
                    $selected = ($resultproduct['category'] == $rowcategory['category']) ? "selected='selected'" : "";
                    echo "<option $selected value='" . $rowcategory['category'] . "'>" . $rowcategory['category'] . "</option>";
                }
                ?>
            </select><br><br>

            Stock: <br><br>
            <input type="text" name="Stock" value="<?= $resultproduct['stock_quantity'] ?>" required><br><br>

            Gender: <br><br>
            <select id="genders" class="form-select" name="gender">
            <?php
                while ($rowgender = mysqli_fetch_assoc($resultgenders)) {
                    $selected = ($resultproduct['gender'] == $rowgender['gender']) ? "selected='selected'" : "";
                    echo "<option $selected value='" . $rowgender['gender'] . "'>" . $rowgender['gender'] . "</option>";
                }
                ?>
            </select><br><br>
            <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
          
        </form>
       

</body>

</html>
