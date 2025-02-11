<!DOCTYPE html>
<html>
<?php 
session_start();
include'conn.php'; 
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin Dashboard</title>
    
</head>

<body>

<?php
include'admin_sidebar.php'; 
?>

      <div class="main-content">
          <div class="py-5">
              <h2 class="text-center">Bookings</h2>
          </div>
          <div class="row">

<?php 

// Validate the input for $aid
if (!isset($_SESSION['aid'])) {
    echo "Missing required session variable 'aid'.";
    exit();
}

$aid = mysqli_real_escape_string($conn, $_SESSION['aid']);

// Query the doctors table
$sql = "SELECT * FROM appointments ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

// Check if any doctors were found
if (mysqli_num_rows($result) > 0) {
    // Output the doctor data in a table format

    echo "<table>
          <tr>
            <th>Booking ID</th>
            <th>User Name</th>
            <th>Booking Date</th>
            <th>Booking Time</th>
            <th>Package ID</th>
            <th>Mode</th>
            <th>Payment Type</th>


          </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
              <td>".htmlspecialchars($row["id"])."</td>
              <td>".htmlspecialchars($row["patient_name"])."</td>
              <td>".htmlspecialchars($row["appointment_date"])."</td>
              <td>".htmlspecialchars($row["appointment_time"])."</td>
              <td>".htmlspecialchars($row["doc_id"])."</td>
              <td>".htmlspecialchars($row["mode"])."</td>
              <td>".htmlspecialchars($row["payment"])."</td>
            </tr>";
    }
    echo "</table>";

} else {
    // Output a message if no doctors were found
    echo "No Result Found.";
}

// Close the database connection
mysqli_close($conn);
?>

          </div>
      </div>



  </body>

  </html>