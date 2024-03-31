<?php

include "config.php";

$sql="SELECT products.*,Brand.Brand_Name,Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand";
$result = mysqli_query($conn, $sql);
$card = '';
// brands_imgs/Adidas-logo.webp
while ($row = mysqli_fetch_assoc($result)) {
    $card.='<div class="ca">
    <div class="card-header">
      <img id="logoimg" src="brands_imgs/'.$row['img_URL'].'" alt=""/>
      <h5 id="price">'.$row['price'].'$</h5>
    </div>
    <h5 class="shoe-name text-center">'.$row['product_name'].'</h5>
    <div class="d-flex justify-content-center">
    <img  class="shoeimg" src="shoes_imgs/'.$row['imageURL'].'" alt="" />
    </div>
    <button class="view-product-btn">View Product</button>
  </div>';
}
// SELECT products.*,Brand.Brand_Name,Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE products.Brand ="Nike";

echo $card;

mysqli_close($conn);
?>

