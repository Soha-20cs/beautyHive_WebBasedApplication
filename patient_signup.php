<?php
  $patient_name = $_POST["patient_name"];
  $patient_email = $_POST["patient_email"];
  $patient_password = $_POST["patient_password"];
  $mobile = $_POST["mobile"];
  $address = $_POST["address"];

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "look";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO patients (patient_name, patient_email, patient_password, mobile, address)
  VALUES ('$patient_name', '$patient_email', '$patient_password','$mobile','$address')";

  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Congratulations,Registration completed!");window.location.href="home.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>