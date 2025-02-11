<?php
  // Create a database connection
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "look";
  $connection = mysqli_connect($host, $username, $password, $database);

  // Check if the connection is successful
  if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")"
    );
  }

  // Retrieve the form data
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $phone = mysqli_real_escape_string($connection, $_POST['phone']);
  $address = mysqli_real_escape_string($connection, $_POST['address']);

  // Update the database with the new profile information
  $query = "UPDATE patients SET patient_password = '$password', mobile = '$phone', address = '$address' WHERE pid = 12"; // assuming user with ID 1
  $result = mysqli_query($connection, $query);

  // Check if the update was successful
  if ($result) {
    echo '<script>alert("Congratulations, Appointment Scheduled Successfully!");window.location.href="profile.php";</script>';
  } else {
    echo "Error updating profile: " . mysqli_error($connection);
  }

  // Close the database connection
  mysqli_close($connection);
?>