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
    <title>Doctor Dashboard</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        background-color: #343a40 !important;
        color: #fff;
        height: 100vh;
        padding: 20px;
        position: fixed;
        width: 250px;
    }

    .sidebar a {
        color: #fff;
        display: block;
        margin-bottom: 50px;
        text-decoration: none;
    }

    .sidebar a:hover {
        color: rgb(0, 212, 255);
    }


    .main-content {
        margin-left: 250px;
        padding: 80px;
    }

    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1;
    }

    .upcoming-appointments {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .today-appointments {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .appointment-history {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    .side-user-img {
        width: 150px;
        height: 150px;
        margin-top: 50px;
        object-position: center center;
        margin-left: 28px;
    }

    table {
        width: 95%;
        border-collapse: separate;
        margin: 0 auto;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>
        <?php 
include 'doc_sidebar.php';
?>
    <div class="main-content">
        <div class="py-5">
            <h2 class="text-center">Appointments History</h2>
        </div>
        <div class="row">
            <?php
            
// Validate the input for $doc_id
if (!isset($_SESSION['doc_id'])) {
    echo "Missing required session variable 'doc_id'.";
    exit();
}

$doc_id = mysqli_real_escape_string($conn, $_SESSION['doc_id']);

      // Query the appointments table for today's appointments
      $sql = "SELECT * FROM appointments WHERE remark != 'cancelled' AND appointment_date < CURDATE() AND doc_id = '$doc_id'";
      $result = mysqli_query($conn, $sql);

      // Check if any appointments were found
      if (mysqli_num_rows($result) > 0) {
        // Output the appointment data in a table format
        echo "<table>
          <tr>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Appointment Mode</th>
            <th>Payment</th>
          </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
              <td>" . $row["pid"] . "</td>
              <td>" . $row["patient_name"] . "</td>
              <td>" . $row["appointment_date"] . "</td>
              <td>" . $row["appointment_time"] . "</td>
              <td>" . $row["mode"] . "</td>
              <td>" . $row["payment"] . "</td>
            </tr>";
        }
        echo "</table>";
      } else {
        // Output a message if no appointments were found
        echo "No History Found.";
      }

      // Close the database connection
      mysqli_close($conn);
      ?>
        </div>
    </div>



</body>

</html>