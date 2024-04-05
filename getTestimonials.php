<?php
include 'config.php';

$query = "SELECT * FROM testimonial";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="swiper-slide">
            <div class="responsive-container-block content">
                <p class="text-blk quotes">“</p>
                <p class="text-blk info">' . $row['description_txt'] . '</p>
                <h3>Rating: ' . $row['Rating'] . '/5</h3>
                <p class="text-blk name">' . $row['customer_name'] . '</p>
            </div>
        </div>';
}
?>
