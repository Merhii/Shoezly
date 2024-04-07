<?php
include "config.php";


session_start();

$sqlproduct = "SELECT products.* FROM products";
$resultproduct = mysqli_query($conn, $sqlproduct);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="admin.css" rel="stylesheet">
    <title>Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <h2 class="text-center">Shoezly</h2>
    <div class="d-flex justify-content-center">
        <a href="index.php" class="btn btn-secondary m-5">View Shop</a>
    
    <a href='create.php' class="btn btn-secondary m-5">Add New Shoe</a>
    </div>
    <table class="table">
        <thead >
            <tr class="table-dark">
            <th scope="col" style="width:12%;border-right: 1px solid black;">Name</th>
            <th scope="col" style="width:3%;border-right: 1px solid black;">Price</th>
            <th scope="col" style="width:2%;border-right: 1px solid black;">Brand</th>
            <th scope="col" colspan="3" style="width:10%;border-right: 1px solid black;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($resultproduct as $row) {
                echo "<tr><th scope='row' style='padding:20px;padding-left:10px;border-right: 1px solid black;'>". $row['product_name'] . "</th>";
                echo "<td style='padding:20px;padding-left:10px;border-right: 1px solid black;'>" . $row['price'] . "</td>";
                echo "<td style='padding:20px;padding-left:10px;border-right: 1px solid black;'>" . $row['Brand'] . "</td>";
                echo "<td ><a href='view.php?id=" . $row['product_id'] . "'>&#128065;</a></td>";
                echo "<td ><a href='edit.php?id=" . $row['product_id'] . "'>&#9998;</a></td>";
                echo "<td ><form action='delete.php' method='post'><input type='hidden' name='id' value='" . $row['product_id'] . "'><button class='btn btn-danger' type='submit'>Delete</button></form></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>