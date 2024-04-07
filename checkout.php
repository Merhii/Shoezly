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
    <title>Select Location</title>
    <!-- Include Google Maps API script with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <style>
#img-container {
    background-image: url("/imgs/ship.jpg");
    height: 125vh;
  position: relative;
  background-repeat: no-repeat;
  background-size: cover;
background-position: right top;
display: flex;
background-attachment:fixed;
}

.overlay {
  background-color: rgba(0, 0, 0, 0.6);
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
        #map {
            height: 400px;
            width: 100%;
        }

    </style>
</head>
<body>
    <div id="img-container">
        <div class="overlay"></div>
        <div>
        </div>
</div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_SESSION['User'])) {
            $userFullName = $_SESSION['User'];
            $userName = $userFullName;
        }
    
        $cartItemsJson = $_POST["cartItems"];
        $cartItemsArray = json_decode($cartItemsJson, true);
        
        echo "User Name: " . $userName . "<br>";
    
        if (!empty($cartItemsArray)) {
            $_SESSION['cart-toPurchase'] = [];
            echo "<h2>Cart Items:</h2>";
    
            $productIds = array_map(function($item) {
                return $item['productId'];
            }, $cartItemsArray);
    
            $productIdsString = implode(",", $productIds);
    
            $sql = "SELECT `product_id`, `product_name`, `shoe_size`, `description`, `Brand`, `price`, `category`, `imageURL`, `stock_quantity`, `gender` FROM `products` WHERE `product_id` IN ($productIdsString)";
            $result = mysqli_query($conn, $sql);
      if ($result) {
        $Bill = 0; 
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

      
        echo "Product Name: " . $row['product_name'] . "<br>";
        echo "Quantity: " . $quantity . "<br>";
        echo "Price: " . $total . "<br>";
        $Bill += $total;
    }

    echo "Total Bill: " . $Bill . "<br>";
    $_SESSION['Bill'] = $Bill; 
}
else {
    echo "No items in the cart.";
}
} else {
echo "Cart is empty.";
}
} else {
echo "Form was not submitted.";
}?>

    <!-- <h1>Select Your Location</h1>
    <div id="map"></div>
    <script>
        // Initialize map
        function initMap() {
            // Default location (e.g., city center)
            var defaultLocation = { lat: 33.55159731531833, lng: 35.363276769904566};

            // Create map instance
            var map = new google.maps.Map(document.getElementById('map'), {
                center: defaultLocation,
                zoom: 10
            });

            // Add marker when user clicks on map
            var marker = new google.maps.Marker({
                position: defaultLocation,
                map: map,
                draggable: true
            });

            // Update marker position when user drags it
            marker.addListener('dragend', function(event) {
                updateLocation(event.latLng.lat(), event.latLng.lng());
            });

            // Update marker position when user clicks on map
            map.addListener('click', function(event) {
                marker.setPosition(event.latLng);
                updateLocation(event.latLng.lat(), event.latLng.lng());
            });

            function updateLocation(lat, lng) {
                console.log(lat, lng);

                // Send the location data to the server using AJAX
                $.ajax({
                    type: "POST",
                    url: "update_location.php",
                    data: { lat: lat, lng: lng },
                    success: function(response) {
                        console.log("Location updated successfully");
                    }
                });
            }
        }
    </script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
    </script>
    <form  method="post" action="confirm.php">
    <button type="submit" name="submit" class="btn btn-primary">Confitm Payment</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp1cs3TabqBB-hM5RpM_nGaJUxrLggjko&callback=initMap"></script>
</body>
</html>
