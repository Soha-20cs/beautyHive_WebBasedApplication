<?php
session_start();
  // Connect to the database
  // Replace the placeholder values with your actual database credentials
include'conn.php';

  // Get the form data
  
    $pro_id = $_POST["pro_id"];
    $pro_name = $_POST["pro_name"];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $amount = $_POST['amount'];
    $payment = $_POST['payment'];
    $pid = mysqli_real_escape_string($conn, $_SESSION['pid']);
    $patient_name = mysqli_real_escape_string($conn, $_SESSION['patient_name']);


  // Insert the appointment data into the database
    $sql = "INSERT INTO order_details (patient_name,pid,pro_id,pro_name,address, city, pincode, amount,payment) VALUES ('$patient_name','$pid','$pro_id','$pro_name','$address', '$city', '$pincode','$amount', '$payment')";

  if (mysqli_query($conn, $sql)) {
   echo '<script>alert("You have successfully ordered.");window.location.href="home.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

// Add this after the INSERT query
if (mysqli_query($conn, "DELETE FROM cart WHERE pid='$pid'")) {
   echo "Cart table emptied successfully.";
} else {
   echo "Error emptying cart table: " . mysqli_error($conn);
}


  mysqli_close($conn);
?>