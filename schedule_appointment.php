<?php

session_start();

include'conn.php';

  // Get the form data
  $pid = mysqli_real_escape_string($conn, $_SESSION['pid']);
  $patient_name = $_SESSION['patient_name'];
  $appointment_date = $_POST['appointment_date'];
  $appointment_time = $_POST['appointment_time'];
  $doc_id = $_POST['doc_id'];
  $mode = $_POST['mode'];
  $payment = $_POST['payment'];

  // Insert the appointment data into the database
  $sql = "INSERT INTO appointments (pid,patient_name, appointment_date, appointment_time, doc_id, mode, payment)
          VALUES ('$pid','$patient_name', '$appointment_date', '$appointment_time', '$doc_id', '$mode','$payment')";

  if (mysqli_query($conn, $sql)) {
    echo '<script>alert("Congratulations, Appointment Scheduled Successfully!");window.location.href="home.php";</script>';
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
?>