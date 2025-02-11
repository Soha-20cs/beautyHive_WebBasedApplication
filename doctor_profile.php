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
    <title>User Profile</title>
    <style>
    body {
        background-image: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(62, 62, 62, 1) 20%, rgba(108, 108, 108, 1) 35%, rgba(148, 148, 148, 1) 47%, rgba(149, 149, 149, 1) 50%, rgba(148, 148, 148, 1) 53%, rgba(108, 108, 108, 1) 65%, rgba(59, 59, 59, 1) 80%, rgba(0, 0, 0, 1)100%);
    }

    .profile-section {
        max-width: 600px;
        height: auto;
        margin: 50px auto;
        padding: 20px;
        background: linear-gradient(90deg, #833ab4 0%, #fd1d1d 50%, #fcb045 100%);
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
        color: white;
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

      .tiles {
          background-color: #ffffff;
          padding: 100px;
          border-radius: 15px;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
          margin-bottom: 40px;
          margin-top: 40px;
      }

      /* Add a gradient background color for the tiles */
      .tiles.green {
          background: linear-gradient(90deg, rgb(2, 0, 36) 0%, rgb(9, 9, 121) 35%, rgb(0, 212, 255) 100%);
          color: #ffffff;
      }

      .tiles.blue {
          background: linear-gradient(90deg, rgba(2, 0, 36, 1) 15%, rgba(208, 28, 28, 1) 96%);
          color: #ffffff;
      }

      /* Add a hover effect for the tiles */
      .tiles:hover {
          transform: scale(1.05);
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      }

      .side-user-img {
          width: 150px;
          height: 150px;
          margin-top: 50px;
          object-position: center center;
          margin-left: 28px;
      }
    </style>
</head>

<body>
    <?php 
include 'doc_sidebar.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $specialization = mysqli_real_escape_string($conn, $_POST['specialization']);
    $doc_desc = mysqli_real_escape_string($conn, $_POST['doc_desc']);
    $doc_price = mysqli_real_escape_string($conn, $_POST['doc_price']);
    $doc_id = mysqli_real_escape_string($conn, $_SESSION['doc_id']);

    // Update the database with the new profile information
    $query = "UPDATE doctors SET password = '$password', specialization = '$specialization', doc_desc = '$doc_desc', doc_price = '$doc_price'  WHERE doc_id = $doc_id"; // assuming user with ID 1
    $result = mysqli_query($conn, $query);

    // Check if the update was successful
    if ($result) {
      echo '<script>alert("Congratulations, Profile updated Successfully!");window.location.href="doctor_profile.php";</script>';
    } else {
      echo "Error updating profile: " . mysqli_error($conn);
    }
}

$doc_id = mysqli_real_escape_string($conn, $_SESSION['doc_id']);
// Query the database for the user profile information
$query = "SELECT * FROM doctors WHERE doc_id = $doc_id"; // assuming user with ID 1
$result = mysqli_query($conn, $query);

// Fetch the user profile information
$user = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<div class="main-content">
    <div class="profile-section">
        <h2>Welcome, <?php echo $user['doctor_name']; ?></h2>
        <form method="POST">
            <h4><strong>Email:</strong> <?php echo $user['doctor_email']; ?></h4><br>
            <label for="password"><strong>Password:</strong></label>
            <input type="text" name="password" id="password" value="<?php echo $user['password']; ?>" required>
            <label for="specialization"><strong>Specialization:</strong></label>
            <input type="text" name="specialization" id="specialization" value="<?php echo $user['specialization']; ?>" readonly>
            <label for="doc_price"><strong>Your Fee:</strong></label>
            <input type="text" name="doc_price" id="doc_price" value="<?php echo $user['doc_price']; ?>" required>
            <label for="doc_desc"><strong>Description:</strong></label>
            <textarea name="doc_desc" id="doc_desc" required><?php echo $user['doc_desc']; ?></textarea>
            <input type="submit" value="Update">
        </form>
    </div>
</div>

    <?php include 'footer.php' ?>
</body>

</html>