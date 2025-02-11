<?php
  $doctor_name = $_POST["doctor_name"];
  $doctor_email = $_POST["doctor_email"];
  $doctor_password = $_POST["doctor_password"];
  $specialization = $_POST["specialization"];
  $doc_price = $_POST["doc_price"];
  $doc_desc = $_POST["doc_desc"];
  $doc_image = "images/" . $_FILES["doc_image"]["name"];

  include 'conn.php';

  $stmt = $conn->prepare("INSERT INTO doctors (doctor_name, doctor_email, doctor_password, specialization, doc_price, doc_desc, doc_image) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssdss", $doctor_name, $doctor_email, $doctor_password, $specialization, $doc_price, $doc_desc, $doc_image);

  if ($stmt->execute()) {
    echo '<script>alert("Congratulations,Registration completed!");window.location.href="home.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
  $conn->close();
?>
