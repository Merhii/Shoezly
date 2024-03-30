<?php

include "config.php";

$sql="SELECT products.*,Brand.Brand_Name,Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand";
$result = mysqli_query($conn, $sql);

// brands_imgs/Adidas-logo.webp
while ($row = mysqli_fetch_assoc($result)) {
    $card.='<div class="ca">
    <div class="card-header">
      <img id="logoimg" src="brands_imgs/'.$row['img_URL'].'" alt=""/>
      <h5 id="price">'.$row['price'].''.$row['shoe_size'].''.$row['category'].''.$row['stock_quantity'].'$</h5>
    </div>
    <h4 class="text-center" id="imgtxt">'.$row['product_name'].'</h4>
    <img  id="shoeimg" src="shoes_imgs/'.$row['imageURL'].'" alt="" />
    <button class="view-product-btn">View Product</button>
  </div>';
}
// SELECT products.*,Brand.Brand_Name,Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE products.Brand ="Nike";

echo $card;

mysqli_close($conn);
?>

