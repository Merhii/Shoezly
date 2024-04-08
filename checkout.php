<?php
session_start();
include 'config.php';          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Shipment</title>
    <link rel="stylesheet" href="Card&Cart.css">
    <!-- Include Google Maps API script with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <style>
#img-container {
    background-image: url("imgs/ship-modified.jpg");
    height: 1000vh;
    width:100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: right top;
    display: flex;
    background-attachment:fixed;
    position: absolute;
    z-index: -1;
}

.overlay {
  background-color: rgba(0, 0, 0, 0.7);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.confirm{
    width: 15%;
    color: white;
    background-color: #4b4237;
    border-radius: 20px;
    padding: 5px 10px;
    border: 0;
}

    </style>
</head>
<body>
    <div id="img-container">
        <div class="overlay"></div>
        <div>
        </div>
</div>

<button id="backButton" style="margin:10px; border-radius: 15px; padding:10px; width:100px; background-color:gray">Back</button>


<script>
document.getElementById("backButton").addEventListener("click", function() {
    window.history.back();
});
</script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_SESSION['User'])) {
            $userFullName = $_SESSION['User'];
            $userName = $userFullName;
        }
    
        $cartItemsJson = $_POST["cartItems"];
        $cartItemsArray = json_decode($cartItemsJson, true);
        
        echo "<h2 class='text-light text-center'>Shipped to: " . $userName . "</h2>";
    
        if (!empty($cartItemsArray)) {
            $_SESSION['cart-toPurchase'] = [];
          
            echo '<div class="all-cards-container">';
            $productIds = array_map(function($item) {
                return $item['productId'];
            }, $cartItemsArray);
    
            $productIdsString = implode(",", $productIds);
    
            $sql = "SELECT products.*, Brand.Brand_Name, Brand.img_URL FROM Brand INNER JOIN products ON Brand.Brand_Name LIKE products.Brand WHERE `product_id` IN ($productIdsString)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $Bill = 0; 
                echo '<div class="cards-container d-flex justify-content-center flex-wrap">';
            while ($row = mysqli_fetch_assoc($result)) {
                $total = 0;
                $quantity = 0;

                foreach ($cartItemsArray as $item) {
                    if ($item['productId'] == $row['product_id']) {
                        $quantity = $item['quantity'];
                        $total += $row['price'] * $quantity;

                        $_SESSION['cart-toPurchase'][] = [
                            'productId' => $item['productId'],
                            'quantity' => $quantity,
                            'total' => $total
                        ];
                        break;
                    }
                }

                echo '
                <div style="background-color: rgb(177, 177, 177);" class="ca 26">
                <div class="card-header">
                <img id="logoimg" src="brands_imgs/'.$row['img_URL'].'" alt="">
                </div>
                <h5 class="shoe-name text-center">' . $row['product_name'] . '</h5>
                <div class="d-flex justify-content-center">
                <img class="shoeimg" src="shoes_imgs/'.$row['imageURL'].'" alt="">
                </div>
                <div style="
                align-self: center;
                transform: translateY(-80px);">Quantity: ' . $quantity . '<br> Price: ' . $total . '</div></div>';
                    $Bill += $total;
            }

            echo "</div><h4 class='text-light text-center'> Total Bill: " . $Bill . "$</h4>";
            $_SESSION['Bill'] = $Bill; 
            $cartItemsJson = '';
        }
        else {
            echo "No items in the cart.";
        }
        } else {
            echo "<p style='color:white; text-align:center'>Cart is empty.</p>";
        }
    } else {
    echo "<p style='color:white; text-align:center'>Cart is empty.";
    }?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </script>
    <form  method="post" id="shipform" action="confirm.php" class="d-flex justify-content-center">
    <button type="submit" name="submit" class="confirm">Confirm Shipment</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#shipform').submit(function(e) {
            e.preventDefault(); 
            
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                success: function(response) {
                    if (response == "Cart is empty."){
                        window.location.href = "checkout.php";
                    }else{
                        window.location.href = "index.php?popup=1";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
</body>
</html>
