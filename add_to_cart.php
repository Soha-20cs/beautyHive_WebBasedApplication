<?php
session_start();
 include'conn.php';

$pro_id = $_POST['pro_id'];
$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);

$sql = "INSERT INTO cart (pro_id,pid) VALUES ('$pro_id','$pid')";

if ($conn->query($sql) === TRUE) {
    echo "Product added to cart successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>