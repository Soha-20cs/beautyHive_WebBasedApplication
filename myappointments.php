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

    <title>My Bookings</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
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

<!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">look</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myappointments.php">My Bookings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myorders.php">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

      <div class="main-content">
          <div class="py-5">
              <h2 class="text-center">Your Bookings</h2>
          </div>
          <div class="row">

<?php 

// Validate the input for $pid
if (!isset($_SESSION['pid'])) {
    echo "Missing required session variable 'pid'.";
    exit();
}

$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);

// Query the doctors table
$sql = "SELECT * FROM appointments WHERE pid = '$pid' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

// Check for errors in the SQL query
if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

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