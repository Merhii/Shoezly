<?php

include "config.php";

$sql = "SELECT DISTINCT gender FROM `products`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $gender = $row['gender'];
    $sql = "SELECT products.*, Brand.Brand_Name, Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE gender = '$gender'";
    if(isset($_GET['price'])){
        $price = $_GET['price'];
        $sql.=" ORDER BY price $price";
        $resultproduct = mysqli_query($conn, $sql);
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
        <h2> <strong>'. $gender. '</strong></h2>
        </div>
            <div style="padding-left: 10%; padding-right:10%;" class="cards-container d-flex justify-content-center flex-wrap">
            '. $card . '</div>';
    }
    else if(isset($_GET['category'])) {
        $category = $_GET['category'];
        $sql.=" AND category = '$category'";    
        $resultproduct = mysqli_query($conn, $sql);
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
        <h2> <strong>'. $gender. '</strong></h2>
        </div>
            <div style="padding-left: 10%; padding-right:10%;" class="cards-container d-flex justify-content-center flex-wrap">
            '. $card . '</div>';
    }
    // else if(isset($_GET['size'])) {
    //     $size = $_GET['size'];
    //     $sql.=" AND size = $size";
    //     $resultproduct = mysqli_query($conn, $sql);
    //     $card = '';
    //     while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {
    //     $card.='<div class="ca">
    //         <div class="card-header">
    //         <img id="logoimg" src="brands_imgs/'.$rowproduct['img_URL'].'" alt=""/>
    //         <h5 id="price">'.$rowproduct['price'].'$</h5>
    //         </div>
    //         <h5 class="shoe-name text-center">'.$rowproduct['product_name'].'</h5>
    //         <div class="d-flex justify-content-center">
    //         <img  class="shoeimg" src="shoes_imgs/'.$rowproduct['imageURL'].'" alt="" />
    //         </div>
    //         <button class="view-product-btn">View Product</button>
    //         </div>';
    //     }
    //     echo '<div style="display:flex; justify-content:center;margin-top: 30px;margin-left: 10%; margin-right:10%;border-bottom:2px solid gray;">
    //     <h2> <strong>'. $gender. '</strong></h2>
    //     </div>
    //         <div style="padding-left: 10%; padding-right:10%;" class="cards-container d-flex justify-content-center flex-wrap">
    //         '. $card . '</div>';
    // }
}

mysqli_close($conn);