<?php
include 'config.php';

$sql = "SELECT DISTINCT shoe_size FROM `products` ORDER BY `products`.`shoe_size` ASC";
$result = mysqli_query($conn, $sql);

$divforsizes = '<div class="filtersizes">All</div>';

while ($row = mysqli_fetch_assoc($result)) {
    $divforsizes .= '<div class="filtersizes" id="' . $row['shoe_size'] . '">' . $row['shoe_size'] . '</div>';
}

echo $divforsizes;

mysqli_close($conn);
?>
