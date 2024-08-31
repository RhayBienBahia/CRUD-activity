<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid #007bff;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Table of Products</h1>
    <table id="products" class="display" border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'dtb.php';

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['description']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['quantity']}</td>
                                <td>{$row['created_at']}</td>
                                <td>{$row['updated_at']}</td>
                                <td class='actions'>
                                    <a href='update.php?id={$row['id']}'>Update</a> | 
                                    <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this product?');\">Delete</a>
                                </td>
                             </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No products found</td></tr>";
                }

                $conn->close();
            ?>
        </tbody>
    </table>

    <a href="index.php" class="button">Add Product</a>
</body>
</html>
