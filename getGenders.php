<?php
include 'config.php';

$sql = "SELECT DISTINCT gender FROM products ORDER BY `products`.`gender` ASC";
$result = mysqli_query($conn, $sql);

$options = '<option value="">All</option>';

while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['gender'] . '">' . $row['gender'] . '</option>';
}

echo $options;

mysqli_close($conn);