<!DOCTYPE html>
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
    <link href="home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <title>Admin Dashboard</title>
    <style>
     body {
        background-image: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(62, 62, 62, 1) 20%, rgba(108, 108, 108, 1) 35%, rgba(148, 148, 148, 1) 47%, rgba(149, 149, 149, 1) 50%, rgba(148, 148, 148, 1) 53%, rgba(108, 108, 108, 1) 65%, rgba(59, 59, 59, 1) 80%, rgba(0, 0, 0, 1)100%);
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

      <?php
include'admin_sidebar.php'; 
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $aid = mysqli_real_escape_string($conn, $_SESSION['aid']);

    // Update the database with the new profile information
    $query = "UPDATE admin SET password = '$password'  WHERE aid = $aid"; // assuming user with ID 1
    $result = mysqli_query($conn, $query);

    // Check if the update was successful
    if ($result) {
      echo '<script>alert("Congratulations, Profile updated Successfully!");window.location.href="doctor_profile.php";</script>';
    } else {
      echo "Error updating profile: " . mysqli_error($conn);
    }
}

$aid = mysqli_real_escape_string($conn, $_SESSION['aid']);
// Query the database for the user profile information
$query = "SELECT * FROM admin WHERE aid = $aid"; // assuming user with ID 1
$result = mysqli_query($conn, $query);

// Fetch the user profile information
$user = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<div class="main-content">
    <div class="profile-section">
        <h2>Welcome, <?php echo $user['name']; ?></h2>
        <form method="POST">
            <h4><strong>Email:</strong> <?php echo $user['email']; ?></h4><br>
            <label for="password"><strong>Password:</strong></label>
            <input type="text" name="password" id="password" value="<?php echo $user['password']; ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>
</div>


    <?php include 'footer.php' ?>
</body>

</html>