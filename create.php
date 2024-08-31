<?php
    include 'dtb.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];     
            
          
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $name, $description, $price, $quantity); 
        if ($stmt->execute()) {
        
            header("LOCATION: read.php");
            exit(); 
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }
    
    $conn->close();
    ?>  
        