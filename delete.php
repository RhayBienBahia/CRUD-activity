<?php
include 'dtb.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

   
    if ($stmt->execute()) {
        echo "Deleted successfully";
        header("Location: read.php"); 
        exit();
    } else {
        echo "Unsuccessful: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>