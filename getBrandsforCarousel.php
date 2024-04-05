<?php
include 'config.php';

$sql = "SELECT * FROM `brand`";

$result = mysqli_query($conn, $sql);

$img = '';

while ($row = mysqli_fetch_assoc($result)) {
    $img .= '<img class = "brandlogo" id = "' . $row['Brand_Name'] . '" src="brands_imgs/' . $row['img_URL'] . '"></img>';
}

echo $img;

mysqli_close($conn);