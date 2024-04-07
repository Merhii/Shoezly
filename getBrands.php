<?php
include 'config.php';

$sql = "SELECT DISTINCT Brand FROM `products` ORDER BY `products`.`Brand` ASC";

$result = mysqli_query($conn, $sql);

$options = '';

while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['Brand'] . '">' . $row['Brand'] . '</option>';
}

echo $options;

mysqli_close($conn);