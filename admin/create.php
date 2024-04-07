<?php
session_start();
include "config.php";
$sqlproduct = "SELECT products.* FROM products";
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
    <h2 class="text-center">Add Product </h2>
    <a href="index.php" class="btn btn-primary mb-5">Back</a>
    <?php
    // Check if a message is set in the session and if it's an array
    if (isset($_SESSION["message"]) && is_array($_SESSION["message"])) {
        // Display the message
        echo "<div id='message'>" . $_SESSION["message"]["text"] . "</div>";

        // Check if 5 seconds have passed since the message was set
        if (time() - $_SESSION["message"]["timestamp"] >= 5) {
            // Unset the message from the session
            unset($_SESSION["message"]);
        } else {
            // Add JavaScript to hide the message after 5 seconds
            echo "<script>
                    setTimeout(function() {
                        document.getElementById('message').style.display = 'none';
                    }, 5000); // 5000 milliseconds = 5 seconds
                  </script>";
        }
    }
    ?>
    <form action="store.php" method="post" enctype="multipart/form-data">

        <input type="file" name="image" required><br><br>

        Name: <input type="text" name="name" required><br><br>

        Size: <input type="text" name="Size" required><br><br>

        Description: <textarea name="description"></textarea><br><br>

        Brand: <br><br>
        <select id="Brand" class="form-select" name="Brand">
        <?php
            while ($rowbrand = mysqli_fetch_assoc($resultbrand)) {
                echo "<option value='" . $rowbrand['Brand_Name'] . "'>" . $rowbrand['Brand_Name'] . "</option>";
            }
            ?>
        </select><br><br>

        Price: <input type="text" name="Price" required><br><br>

        Category: <br><br>
        <select id="Cat" class="form-select" name="Cat">
        <?php
            while ($rowcategory = mysqli_fetch_assoc($resultcategories)) {
                echo "<option value='" . $rowcategory['category'] . "'>" . $rowcategory['category'] . "</option>";
            }
            ?>
        </select><br><br>

        Stock: <input type="text" name="Stock" required><br><br>

        Gender: <br><br>
        <select id="genders" class="form-select" name="gender">
        <?php
            while ($rowgender = mysqli_fetch_assoc($resultgenders)) {
                echo "<option value='" . $rowgender['gender'] . "'>" . $rowgender['gender'] . "</option>";
            }
            ?>
        </select><br><br>
<button class="btn btn-primary" type="submit" name="submit">Add Product</button>
        
    </form>
    

</body>

</html>