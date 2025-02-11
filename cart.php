<!DOCTYPE html>
<html>
<?php
session_start();
include'conn.php';

// Validate the input for $doc_id
if (!isset($_SESSION['pid'])) {
    echo "Missing required session variable 'pid'.";
    exit();
}
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
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    td img {
        width: 100px;
    }

    .remove-btn {
        background-color: red;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        box-shadow: 2px 2px 5px #ccc;
        cursor: pointer;
    }
    </style>
    <title>look</title>
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


    <section class="my-5">
        <div class="py-5">
            <h2 class="text-center">Your Cart</h2>
        </div>
    </section>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>

        <?php

$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);

// Get pro_id from cart table
$sql = "SELECT pro_id FROM cart WHERE pid=$pid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $pro_id = $row["pro_id"];
        
        // Get pro_name and pro_price from product table for the given pro_id
        $sql2 = "SELECT pro_name, pro_price, pro_image FROM product WHERE pro_id = '$pro_id'";
        $result2 = $conn->query($sql2);
        
        if ($result2->num_rows > 0) {
            $row2 = $result2->fetch_assoc();
            
            $pro_name = $row2["pro_name"];
            $pro_price = $row2["pro_price"];
            $pro_image = $row2["pro_image"];
        
                
                // Show pro_id, pro_name, pro_price, and image in the cart table
                echo "<tr>";
                echo "<td>" . $pro_id . "</td>";
                echo "<td>" . $pro_name . "</td>";
                echo "<td>" . $pro_price . "</td>";
                echo "<td><img src='" . $pro_image . "'></td>";
                echo "<td>
                      <form action='remove_from_cart.php' method='post'>
                          <input type='hidden' name='pro_id' value='".$pro_id."'>
                          <input type='submit' name='remove' value='Remove' class='remove-btn'>
                      </form>
                      </td>";
                echo "</tr>";
            } else {
                echo "0 results for product id: " . $pro_id;
            }
        }
    }
else {
    echo "<div style='text-align: center;'>No items in cart</div><br><br>";
}

$conn->close();
?>
    </table>

    <div class="my-5"></div>
    <div class="text-center">
        <a href="checkout.php" class="btn btn-primary">Checkout</a>
    </div>

    <div class="my-5"></div>
    <?php include 'footer.php' ?>

</body>

</html>