<?php
include 'config.php';

$sql = "SELECT DISTINCT category FROM `products` ORDER BY `products`.`category` ASC";
$result = mysqli_query($conn, $sql);

$divforcategories = '<div class="filtercategories">All</div>';

while ($row = mysqli_fetch_assoc($result)) {
    $divforcategories .= '<div class="filtercategories" id="' . $row['category'] . '">' . $row['category'] . '</div>';
}

echo $divforcategories;

mysqli_close($conn);
?>
