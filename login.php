<?php
include 'config.php';
session_start();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $query="SELECT * FROM customers WHERE email='".$_POST['email']."' and password='".$_POST['password']."'  ";
    $result=mysqli_query($conn,$query);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['User']=$row['first_name']."   ".$row['last_name'];
        echo "Login successful";
    }
    else{
        echo "Wrong UserName or Password";
    }
}
else{
    echo "not working";
}
