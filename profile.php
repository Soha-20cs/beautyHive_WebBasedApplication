<!DOCTYPE html>
<html>
  <?php
  session_start(); 
include 'conn.php';

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
    <link href="home.css" rel="stylesheet">
    <title>User Profile</title>
    <style>
    body {
        background-image: url(images/47.jpg);
            background-size: cover;
    }

    .profile-section {
        max-width: 600px;
        height: auto;
        margin: 50px auto;
        padding: 20px;
        background-image: linear-gradient(to bottom, #faffee, #cfcbae, #aa9773, #896341, #67311a);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .profile-section h2 {
        margin-bottom: 40px;
        font-size: 35px;
        color: #333;
        margin-top: 30px;
        color: black;
    }

    .profile-section form {
        display: flex;
        flex-direction: column;
    }

    .profile-section label {
        display: inline-block;
        font-size: 18px;
        color: #fff;
        margin-bottom: 5px;
    }

    .profile-section input,
    .profile-section textarea {
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        color: #333;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-section input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
    }

    .profile-section input[type="submit"]:hover {
        background-color: #3e8e41;
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

    <?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pid = mysqli_real_escape_string($conn, $_SESSION['pid']);

    // Update the database with the new profile information
    $query = "UPDATE patients SET patient_password = '$password', mobile = '$phone', address = '$address' WHERE pid = $pid"; // assuming user with ID 1
    $result = mysqli_query($conn, $query);

    // Check if the update was successful
    if ($result) {
      echo '<script>alert("Congratulations, Profile updated Successfully!");window.location.href="profile.php";</script>';
    } else {
      echo "Error updating profile: " . mysqli_error($conn);
    }
}

$pid = mysqli_real_escape_string($conn, $_SESSION['pid']);
// Query the database for the user profile information
$query = "SELECT * FROM patients WHERE pid = $pid"; // assuming user with ID 1
$result = mysqli_query($conn, $query);

// Fetch the user profile information
$user = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

    <div class="profile-section">
        <h2>Welcome, <?php echo $user['patient_name']; ?></h2>
        <form method="POST">
            <h4><strong>Email:</strong> <?php echo $user['patient_email']; ?></h4><br>
            <label for="password"><strong>Password:</strong></label>
            <input type="text" name="password" id="password" value="<?php echo $user['patient_password']; ?>" required>
            <label for="phone"><strong>Phone:</strong></label>
            <input type="tel" name="phone" id="phone" value="<?php echo $user['mobile']; ?>" required>
            <label for="address"><strong>Address:</strong></label>
            <textarea name="address" id="address" required><?php echo $user['address']; ?></textarea>
            <input type="submit" value="Update">
        </form>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>