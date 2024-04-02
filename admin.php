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

<?php
    // Check if a message is set in the session and if it's an array
    if (isset($_SESSION["message"]) && is_array($_SESSION["message"])) {
        // Display the message
        echo "<div id='message'>" . $_SESSION["message"]["text"] . "</div>";

        // Check if 5 seconds have passed since the message was set
        if (time() - $_SESSION["message"]["timestamp"] >= 5) {
            // Unset the message from the session
            unset($_SESSION["message"]);
        } else {
            // Add JavaScript to hide the message after 5 seconds
            echo "<script>
                    setTimeout(function() {
                        document.getElementById('message').style.display = 'none';
                    }, 5000); // 5000 milliseconds = 5 seconds
                  </script>";
        }
    }
    ?>
    <form action="adminAdd.php" method="post" enctype="multipart/form-data">

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

