<?php
include 'config.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Using prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM customers WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row['user_type']=="admin"){
            $_SESSION['User'] = $row['first_name'];
            echo "admin logged in";
        }
        elseif($row['user_type']=="user"){
        $_SESSION['User'] = $row['first_name'] . " " . $row['last_name'];
        $_SESSION['UserName'] = $row['first_name'];
        }} 
    else {
        echo "Wrong UserName or Password";
    }
} else {
    echo "not working";
}