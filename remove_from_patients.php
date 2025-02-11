<?php
session_start();
include'conn.php';

if (isset($_POST['remove'])) {
    $pid = $_POST['pid'];
    
    // Remove the item with the given pro_id from the cart table
    $sql = "DELETE FROM patients WHERE pid='$pid'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_patients.php");
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$conn->close();
?>