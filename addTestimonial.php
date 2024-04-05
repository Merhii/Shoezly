<?php
include 'config.php';
session_start();

if(isset($_POST['rating']) && isset($_POST['testimonial']) && isset($_SESSION['User']))
{
    $rating = $_POST['rating'];
    $description = $_POST['testimonial'];
    $customer_name = $_SESSION['User'];

    $query="INSERT INTO testimonial (Rating, description_txt, customer_name) VALUES ('$rating', '$description', '$customer_name')";
    $result=mysqli_query($conn,$query);
    
    if ($result) {
        echo "Success";
    } else {
        echo "Error inserting testimonial.";
    }
} else {
    echo "Invalid request.";
}
