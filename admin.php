<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="admin.css" rel="stylesheet">
    <title>Admin</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
<h2>Add Item </h2>
   
    <!-- Form for uploading image -->
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <input type="file" name="image" required><br><br>
        
        Name: <input type="text" name="name" required><br><br>

        Size: <input type="text" name="Size" required><br><br>
       
        Description: <textarea name="description"></textarea><br><br>
       
        Brand: <br><br>
                <select id="Brand" class="form-select" name="Brand">
                </select><br><br>

        Price: <input type="text" name="Price" required><br><br>

        Category: <br><br>
                <select id="Cat" class="form-select" name="Cat">
                </select><br><br>

        Stock: <input type="text" name="Stock" required><br><br>

        Gender: <br><br>
                <select id="genders" class="form-select" name="gender">
                </select><br><br>

        <input type="submit" value="Add Shoe" name="submit">
    </form>

<script src="admin.js"></script>

</body>
</html>


