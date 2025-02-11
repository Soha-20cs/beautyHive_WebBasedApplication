  <?php
  // Connect to the database
  // Replace the placeholder values with your actual database credentials
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "look";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>