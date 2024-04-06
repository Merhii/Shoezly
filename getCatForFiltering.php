<?php
include 'config.php';

$sql = "SELECT DISTINCT category FROM `products` ORDER BY `products`.`category` ASC";
$result = mysqli_query($conn, $sql);

$divforcategories = '';

while ($row = mysqli_fetch_assoc($result)) {
    $divforcategories .= '<div class="filtercategories togglefiltersubitem" id="' . $row['category'] . '">' . $row['category'] . '</div>';
}

echo $divforcategories;

mysqli_close($conn);