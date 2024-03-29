<?php
include 'config.php';

$sql = "SELECT DISTINCT category FROM `products` ORDER BY `products`.`category` ASC";
$result = mysqli_query($conn, $sql);

$options = '<option value="">All</option>';

while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
}

echo $options;

mysqli_close($conn);
?>
