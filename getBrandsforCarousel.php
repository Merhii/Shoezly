<?php
include 'config.php';

$sql = "SELECT img_URL FROM `brand`";

$result = mysqli_query($conn, $sql);

$img = '';

while ($row = mysqli_fetch_assoc($result)) {
    $img .= '<img src="' . $row['img_URL'] . '"></img>';
}

echo $img;

mysqli_close($conn);