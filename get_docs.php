  <?php
  // Connect to the database and retrieve the list of doctors for the selected specialization
  // Replace the placeholder values with your actual database credentials
include'conn.php';

  $specialization = $_POST['specialization'];

  $sql = "SELECT doc_id, doctor_name FROM doctors WHERE specialization = '$specialization'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value='" . $row['doc_id'] . "'>" . $row['doctor_name'] . "</option>";
    }
  } else {
    echo "<option value=''>No doctors available</option>";
  }

  mysqli_close($conn);
?>