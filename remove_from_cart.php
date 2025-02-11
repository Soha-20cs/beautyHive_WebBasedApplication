<?php
session_start();
include'conn.php';

if (isset($_POST['remove'])) {
    $pro_id = $_POST['pro_id'];
    
    // Remove the item with the given pro_id from the cart table
    $sql = "DELETE FROM cart WHERE pro_id='$pro_id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: cart.php");
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$conn->close();
?>