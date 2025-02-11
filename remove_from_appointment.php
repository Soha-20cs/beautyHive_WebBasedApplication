<?php
session_start();
include'conn.php';

if (isset($_POST['remove'])) {
    $id = $_POST['id'];
    
    // Remove the item with the given pro_id from the cart table
    $sql = "DELETE FROM appointments WHERE id='id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: doctor_login.php");
    } else {
        echo "Error in removing: " . $conn->error;
    }
}

$conn->close();
?>