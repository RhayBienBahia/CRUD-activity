<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD ACTIVITY</title>
</head>
<body>
        <form action="create.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" required><br><br>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required><br><br>
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" required><br><br>
            <input type="submit" value="Add Product">
    </form>
</body>
</html>
<?php
    
?>