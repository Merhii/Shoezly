<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoezly_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
    // echo "Hello world";
}