<?php

include "config.php";

$sqlGender = "SELECT DISTINCT gender FROM `products`";
$resultGender = mysqli_query($conn, $sqlGender);

while ($rowGender = mysqli_fetch_assoc($resultGender)) {
    $gender = $rowGender['gender'];

    $sqlProduct = "SELECT products.*, Brand.Brand_Name, Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE gender = ?";
    
    if(isset($_GET['price'])){
        $price = $_GET['price'];
        $sqlProduct .= " ORDER BY price $price";
    }
    else if(isset($_GET['category'])) {
        $category = $_GET['category'];
        $sqlProduct .= " AND category = ?";
    }

    $stmtProduct = mysqli_prepare($conn, $sqlProduct);

        if(isset($_GET['category'])) {
        mysqli_stmt_bind_param($stmtProduct, "ss", $gender, $category);
    } else {
        mysqli_stmt_bind_param($stmtProduct, "s", $gender);
    }

    mysqli_stmt_execute($stmtProduct);
    $resultProduct = mysqli_stmt_get_result($stmtProduct);

    $card = '';
    while ($rowProduct = mysqli_fetch_assoc($resultProduct)) {
        $card.='<div class="ca">
            <div class="card-header">
            <img id="logoimg" src="brands_imgs/'.$rowProduct['img_URL'].'" alt=""/>
            <h5 id="price">'.$rowProduct['price'].'$</h5>
            </div>
            <h5 class="shoe-name text-center">'.$rowProduct['product_name'].'</h5>
            <div class="d-flex justify-content-center">
            <img  class="shoeimg" src="shoes_imgs/'.$rowProduct['imageURL'].'" alt="" />
            </div>
            <button class="view-product-btn">View Product</button>
            </div>';
    }

    echo '<div style="display:flex; justify-content:center;margin-top: 30px;margin-left: 10%; margin-right:10%;border-bottom:2px solid gray;">
        <h2> <strong>'. $gender. '</strong></h2>
        </div>
        <div style="padding-left: 10%; padding-right:10%;" class="cards-container d-flex justify-content-center flex-wrap">
        '. $card . '</div>';

    mysqli_stmt_close($stmtProduct);
}

mysqli_close($conn);