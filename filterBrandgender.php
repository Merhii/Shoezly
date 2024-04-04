<?php

include "config.php";

if(isset($_GET['gender'])){
    $gender = $_GET['gender'];
    $sql = "SELECT Brand_Name FROM brand";
    $result = mysqli_query($conn, $sql);

    $sqlproduct = "SELECT products.*, Brand.Brand_Name, Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE Brand.Brand_Name = ? AND gender = ?";
    $stmt = mysqli_prepare($conn, $sqlproduct);
    mysqli_stmt_bind_param($stmt, "ss", $brandName, $gender);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $brandName = $row['Brand_Name'];
        mysqli_stmt_execute($stmt);
        $resultproduct = mysqli_stmt_get_result($stmt);
        
        $card = '';
        while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {
            $card.='<div class="ca">
                <div class="card-header">
                <img id="logoimg" src="brands_imgs/'.$rowproduct['img_URL'].'" alt=""/>
                <h5 id="price">'.$rowproduct['price'].'$</h5>
                </div>
                <h5 class="shoe-name text-center">'.$rowproduct['product_name'].'</h5>
                <div class="d-flex justify-content-center">
                <img  class="shoeimg" src="shoes_imgs/'.$rowproduct['imageURL'].'" alt="" />
                </div>
                <button class="view-product-btn">View Product</button>
                </div>';
        }
        echo '<div style="display:flex; justify-content:center;margin-top: 30px;margin-left: 10%; margin-right:10%;border-bottom:2px solid gray;">
            <h2> <strong>'. $brandName. '</strong></h2>
        </div>
        <div style="padding-left: 10%; padding-right:10%;" class="cards-container women-container d-flex justify-content-center flex-wrap">
        '. $card . '</div>';

    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);