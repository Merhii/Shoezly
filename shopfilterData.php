<?php

include "config.php";

$gender = $_GET['gender'] ?? '';
$category = $_GET['category'] ?? '';
$price = $_GET['price'] ?? '';
$size = $_GET['size'] ?? '';

$sqlproduct = "SELECT products.*, Brand.Brand_Name, Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE 1=1";

if ($gender !== '') {
    $sqlproduct .= " AND gender = '$gender'";
} else {
    $sqlgender = "SELECT DISTINCT gender FROM products";
    $resultgender = mysqli_query($conn, $sqlgender);
    $sqlproduct .= " AND gender = '$gender'";
}

if ($category !== '') {
    $sqlproduct .= " AND category = '$category'";
}
if ($price !== '') {
    $sqlproduct .= " ORDER BY price $price";
}
// if ($size !== '') {
//     $sqlproduct .= " AND size = '$size'";
// }


if ($gender == '') {
    while ($rowgender = mysqli_fetch_assoc($resultgender)) {
        $gendern = $rowgender['gender'];
        $sqlproduct_temp = str_replace("'$gender'", "'$gendern'", $sqlproduct);

        $card = "";
        $result = $conn->query($sqlproduct_temp);


        if ($result->num_rows > 0) {
            while ($rowproduct = mysqli_fetch_assoc($result)) {
                $card .= '<div class="ca ' . $rowproduct['product_id'] . '">
                        <div class="card-header">
                        <img id="logoimg" src="brands_imgs/' . $rowproduct['img_URL'] . '" alt=""/>
                        <h5 id="price">' . $rowproduct['price'] . '$</h5>
                        </div>
                        <h5 class="shoe-name text-center">' . $rowproduct['product_name'] . '</h5>
                        <div class="d-flex justify-content-center">
                        <img  class="shoeimg" src="shoes_imgs/' . $rowproduct['imageURL'] . '" alt="" />
                        </div>
                        <button class="view-product-btn">View Product</button>
                        </div>';
            }
            echo '<div style="display:flex; justify-content:center;margin-top: 30px;margin-left: 10%; margin-right:10%;border-bottom:2px solid gray;">
                    <h2> <strong>' . $gendern . '</strong></h2>
                </div>
                <div style="padding-left: 10%; padding-right:10%;" class="cards-container d-flex justify-content-center flex-wrap">
                ' . $card . '</div>';
        }
    }
} else {
    $card = "";
    $result = $conn->query($sqlproduct);
    while ($rowproduct = mysqli_fetch_assoc($result)) {
        $card .= '<div class="ca ' . $rowproduct['product_id'] . '">
                <div class="card-header">
                <img id="logoimg" src="brands_imgs/' . $rowproduct['img_URL'] . '" alt=""/>
                <h5 id="price">' . $rowproduct['price'] . '$</h5>
                </div>
                <h5 class="shoe-name text-center">' . $rowproduct['product_name'] . '</h5>
                <div class="d-flex justify-content-center">
                <img  class="shoeimg" src="shoes_imgs/' . $rowproduct['imageURL'] . '" alt="" />
                </div>
                <button class="view-product-btn">View Product</button>
                </div>';
    }
    echo '<div style="display:flex; justify-content:center;margin-top: 30px;margin-left: 10%; margin-right:10%;border-bottom:2px solid gray;">
            <h2> <strong>' . $gender . '</strong></h2>
        </div>
        <div style="padding-left: 10%; padding-right:10%;" class="cards-container d-flex justify-content-center flex-wrap">
        ' . $card . '</div>';
}

$conn->close();

