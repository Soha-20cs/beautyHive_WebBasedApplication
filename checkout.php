  <html>
  <?php 
session_start();
 ?>

  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

      <style>
      table {
          width: 95%;
          border-collapse: separate;
          margin: 0 auto;
      }

      th,
      td {
          border: 1px solid black;
          padding: 10px;
          text-align: left;
      }

      th {
          background-color: lightgray;
      }

      h2.text-center {
          font-family: Arial, sans-serif;
          font-size: 36px;
          color: #333;
          margin-bottom: 20px;
      }

      form {
          width: 50%;
          margin: 0 auto;
          text-align: left;
          padding: 20px;
          background-color: lightgray;
          border-radius: 10px;
          box-shadow: 0px 0px 10px 0px #333;
      }

      form p {
          font-family: Arial, sans-serif;
          font-size: 18px;
          color: #333;
          margin-bottom: 10px;
      }

      form textarea,
      form input[type="text"] {
          width: 100%;
          padding: 10px;
          font-family: Arial, sans-serif;
          font-size: 18px;
          margin-bottom: 20px;
          border-radius: 5px;
          border: none;
      }

      form input[type="submit"] {
          width: 100%;
          padding: 10px;
          font-family: Arial, sans-serif;
          font-size: 18px;
          margin-top: 20px;
          border-radius: 5px;
          border: none;
          background-color: #333;
          color: #fff;
          cursor: pointer;
      }

      .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%;
      }
      </style>
      <title>Checkout Page</title>
  </head>

  <body>
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
                      <a class="nav-link" href="doctors.php">Packages</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="appointment.php">Bookings</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="medicines.php">Products</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="articles.php">Advisories</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="contact.php">Contact Us</a>
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

      <section>
          <div class="py-5">
              <h2 class="text-center">Checkout</h2>
          </div>
      </section>

      <?php
include 'conn.php';

// Escape the session variable
$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);

// Build the SQL query
$sql = "SELECT cart.pro_id, product.pro_name, product.pro_price, product.pro_image 
        FROM cart 
        JOIN product ON cart.pro_id = product.pro_id 
        WHERE cart.pid = $pid";

// Execute the query and check for errors
$result = $conn->query($sql);
if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
    exit;
}

// Check if there are any rows returned
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Product ID</th>";
    echo "<th>Product Name</th>";
    echo "<th>Price</th>";
    echo "<th>Image</th>";
    echo "</tr>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $pro_id = $row["pro_id"];
        $pro_name = $row["pro_name"];
        $pro_price = $row["pro_price"];
        $pro_image = $row["pro_image"];

        echo "<tr>";
        echo "<td>" . $pro_id . "</td>";
        echo "<td>" . $pro_name . "</td>";
        echo "<td>" . $pro_price . "</td>";
        echo "<td><img src='" . $pro_image . "' alt='product image' style='width:100px;height:100px;'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<div class='my-5'></div>";
} else {
    echo "No items in cart";
}

// Ask for mode of payment
echo "<form action='payment.php' method='post'>";
echo "<input type='hidden' name='pro_id' value='$pro_id'>";
echo "<input type='hidden' name='pro_name' value='$pro_name'>";
echo "<p>Delivery Address:</p>";
echo "<textarea required name='address' rows='4' cols='50' placeholder='Address'></textarea><br>";
echo "<input type='text' required name='city' placeholder='City'>";
echo "<input type='text' required name='pincode' placeholder='Pincode'><br>";

// Calculate the total bill
$sql = "SELECT SUM(pro_price) as total_bill 
        FROM cart 
        JOIN product ON cart.pro_id = product.pro_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_bill = $row["total_bill"];
    $amount = $total_bill + 60;
    echo "<p>Subtotal: " . $total_bill . "</p>";
    echo "<p>Discount: " . -10 . "</p>";
    echo "<p>Shipping: " . 70 . "</p>";
    echo "<p>Amount to be paid: " . $amount . "</p>";
} else {
    echo "No items in cart";
}



echo "<div class='my-5'></div>";

echo "<p>Mode of payment: </p>";
echo "<input type='radio' name='payment' value='card' onclick='showCard()'> Card <br>";
echo "<input type='radio' name='payment' value='upi' onclick='showUPI()'> UPI <br>";
echo "<input type='hidden' name='amount' value='$amount'>";
echo "<div id='cardDiv' style='display:none'>";
    echo "<form>";
        echo "<label for='cardNumber'>Card Number:</label>";
        echo "<input type='text' id='cardNumber' name='cardNumber' pattern='[0-9]{16}' >";
        echo "<br><br>";
        echo "<label for='cardHolderName'>Card Holder Name:</label>";
        echo "<input type='text' id='cardHolderName' name='cardHolderName' >";
        echo "<br><br>";
        echo "<label for='expiryDate'>Expiry Date:</label>";
        echo "<input type='text' id='expiryDate' name='expiryDate' pattern='(0[1-9]|1[0-2])\/[0-9]{2}' placeholder='mm/yy'>";
        echo "<br><br>";
        echo "<label for='cvv'>CVV:</label><br>";
        echo "<input type='password' id='cvv' name='cvv' pattern='[0-9]{3}' >";
        echo "<br><br>";

    
echo "</div>";
echo "<div id='upiDiv' style='display:none'>";
    echo "<img src='images/46.jpg' class='center'>";
   
echo "</div>";
echo " <input type='submit' name='submit' value='Done'>";
echo "</form>";

echo "</form>";

$conn->close();
?>

      <div class="my-5"></div>
      <?php include 'footer.php' ?>

      <script>
      function showCard() {
          document.getElementById('cardDiv').style.display = "block";
          document.getElementById('cardNumber').required = true;
          document.getElementById('cardHolderName').required = true;
          document.getElementById('expiryDate').required = true;
          document.getElementById('cvv').required = true;

          document.getElementById('upiDiv').style.display = "none";
          document.getElementById('upi').required = false;
      }

      function showUPI() {
          document.getElementById('cardDiv').style.display = "none";
          document.getElementById('cardNumber').required = false;
          document.getElementById('cardHolderName').required = false;
          document.getElementById('expiryDate').required = false;
          document.getElementById('cvv').required = false;

          document.getElementById('upiDiv').style.display = "block";
          document.getElementById('upi').required = true;
      }

      function validateForm() {
          if (document.getElementById('payment').value == "") {
              alert("Please select mode of payment");
              return false;
          }
      }
      </script>

  </body>

  </html>