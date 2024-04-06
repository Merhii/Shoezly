<?php
session_start();
include "config.php";

$basePath = __DIR__;

$id = $_POST['id'];

$sql = "DELETE FROM products WHERE product_id = $id";
$result = mysqli_query($conn, $sql);

header("Location:index.php");
exit();
