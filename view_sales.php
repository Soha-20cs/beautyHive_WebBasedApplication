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
    <style>
/* Style the label */
label {
  margin-right: 10px;
    margin-bottom: 0rem;
}

    /* Style the form container */
.form-group {
  display: flex;
  align-items: center;
  justify-content: right;
  flex-wrap: wrap;
  margin: 20px 0;
}

/* Style the select dropdown */
select {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 16px;
  margin-right: 10px;
  min-width: 150px;
}

/* Style the button */
button[type="submit"] {
  padding: 5px 10px;
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

/* Hover effect for the button */
button[type="submit"]:hover {
  background-color: #3e8e41;
}
    </style>
</head>

<body>

<?php
include'admin_sidebar.php'; 
?>

      <div class="main-content">
          <div class="py-5">
              <h2 class="text-center">Sales Report</h2>
          </div>

            <!-- Add a form to select the sort criteria -->
  <form method="GET">
    <div class="form-group">
      <label for="sort" class="fa fa-filter fa-2x" aria-hidden="true"> </label>
      <select name="sort" id="sort">
        <option value="order_id">Order ID</option>
        <option value="pro_name">Product Name</option>
        <option value="patient_name">Patient Name</option>
        <option value="posting_date">Date & Time</option>
        <option value="payment">Payment</option>
      </select>
      <button type="submit">Sort</button>
    </div>
  </form>


          <div class="row">

<?php 

// Validate the input for $aid
if (!isset($_SESSION['aid'])) {
    echo "Missing required session variable 'aid'.";
    exit();
}

$aid = mysqli_real_escape_string($conn, $_SESSION['aid']);

// Set default sort order
$sort_order = "order_id ASC";

// Check if a sort parameter was passed through the form
if (isset($_GET['sort'])) {
  // Validate the input for the sort parameter
  $sort = mysqli_real_escape_string($conn, $_GET['sort']);

  // Set the sort order based on the selected option
  switch ($sort) {
    case "pro_name":
      $sort_order = "pro_name ASC";
      break;
    case "patient_name":
      $sort_order = "patient_name ASC";
      break;
    case "posting_date":
      $sort_order = "posting_date DESC";
      break;
    case "payment":
      $sort_order = "payment ASC";
      break;
    // Order ID is the default sort order
    default:
      $sort_order = "order_id ASC";
break;
}
}

// Build the SQL query
$sql = "SELECT * FROM order_details ORDER BY $sort_order";

// Execute the query and store the results in $result
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
  // Display an error message or debug the issue
  echo "Error executing query: " . mysqli_error($conn);
} else {
  // Check if there are any rows returned from the query
  if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the data
        echo "<table>
          <tr>
            <th>Order ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>User Name</th>
            <th>Address</th>
            <th>Amount</th>
            <th>Payment Type</th>
            <th>Date & Time</th>

          </tr>";
    while ($row = mysqli_fetch_assoc($result)) {
      // display the data
         echo "<tr>
              <td>".htmlspecialchars($row["order_id"])."</td>
              <td>".htmlspecialchars($row["pro_id"])."</td>
              <td>".htmlspecialchars($row["pro_name"])."</td>
              <td>".htmlspecialchars($row["patient_name"])."</td>
              <td>".htmlspecialchars($row["city"])."</td>
              <td>".htmlspecialchars($row["amount"])."</td>
              <td>".htmlspecialchars($row["payment"])."</td>
              <td>".htmlspecialchars($row["posting_date"])."</td>
            </tr>";
    }
  } else {
    // If no rows were returned, display a message
    echo "<p>No sales found.</p>";
  }
}

// Close the database connection
mysqli_close($conn);
?>

  </div>
</div>
</body>
</html>