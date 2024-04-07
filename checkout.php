<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartItemsJson = $_POST["cartItems"];

    $cartItemsArray = json_decode($cartItemsJson, true);

    if (!empty($cartItemsArray)) {
        echo "<h2>Cart Items:</h2>";

        // Construct an array of product IDs from cartItemsArray
        $productIds = array_map(function($item) {
            return $item['productId'];
        }, $cartItemsArray);

        // Implode the array of product IDs into a comma-separated string
        $productIdsString = implode(",", $productIds);

        // Construct the SQL query
        $sql = "SELECT `product_id`, `product_name`, `shoe_size`, `description`, `Brand`, `price`, `category`, `imageURL`, `stock_quantity`, `gender` FROM `products` WHERE `product_id` IN ($productIdsString)";

        // Execute the SQL query
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($result) {

    $Bill=0;
          
            while ($row = mysqli_fetch_assoc($result)) {
                $total=0;
                $quantity = 0;
                foreach ($cartItemsArray as $item) {
                    if ($item['productId'] == $row['product_id']) {
                        $quantity = $item['quantity'];
                        $total+=$row['price']*$quantity;
                        break;
                    }
                }

                echo "Product ID: " . $row['product_id'] . "<br>";
                echo "Product Name: " . $row['product_name'] . "<br>";
                echo "Quantity: " . $quantity . "<br>";
                echo "Total: " . $total . "<br>";
            $Bill+=$total;


            }
            echo "Total Bill :".$Bill."<br>";
        }
        
        else {
            echo "No items in the cart.";
        }
    } else {
        echo "Cart is empty.";
    }
} else {
    // If the form was not submitted, handle the case accordingly
    echo "Form was not submitted.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Select Location</title>
    <!-- Include Google Maps API script with your API key -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp1cs3TabqBB-hM5RpM_nGaJUxrLggjko"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Select Your Location</h1>
    <div id="map"></div>
    <script>
        // Initialize map
        function initMap() {
            // Default location (e.g., city center)
            var defaultLocation = { lat: 33.55159731531833, lng: 35.363276769904566};
// saida : loc 33.55159731531833 35.363276769904566
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

            // Function to update location display
            function updateLocation(lat, lng) {
                console.log('Selected location:', lat, lng);
                // You can perform further actions with the selected location here
            }
        }
    </script>
    <form  method="post" action="confirm.php">
<button type="submit" class="btn btn-primary">Confitm Payment</button>
    </form>
    <!-- Call the initMap function when the page loads -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAp1cs3TabqBB-hM5RpM_nGaJUxrLggjko&callback=initMap"></script>
</body>
</html>
