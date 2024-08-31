<?php
include 'dtb.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Unavailable Product";
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, quantity=?, updated_at=NOW() WHERE id=?");
    $stmt->bind_param("ssdii", $name, $description, $price, $quantity, $id);

   
    if ($stmt->execute()) {
        echo "Record updated successfully";
        header("Location: read.php");
        exit; 
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Update Product</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo ($row['id']); ?>">
        
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo ($row['name']); ?>" required>
        
        <label for="description">Description:</label>
        <textarea name="description" required><?php echo ($row['description']); ?></textarea>
        
        <label for="price">Price:</label>
        <input type="text" name="price" value="<?php echo ($row['price']); ?>" required>
        
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" value="<?php echo ($row['quantity']); ?>" required>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
