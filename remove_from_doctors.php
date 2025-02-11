<?php
session_start();
include'conn.php';

if (isset($_POST['remove'])) {
    $doc_id = $_POST['doc_id'];
    
    // Remove the item with the given pro_id from the cart table
    $sql = "DELETE FROM doctors WHERE doc_id='$doc_id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: manage_doctors.php");
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$conn->close();
?>