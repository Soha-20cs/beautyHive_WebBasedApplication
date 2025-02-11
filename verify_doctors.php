<!DOCTYPE html>
<html>
<?php 
session_start();
include'conn.php'; 
if (!isset($_SESSION['aid'])) {
    echo "Missing required session variable 'aid'.";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin Dashboard</title>
    <style>
        
    .main-content {
        margin-left: 250px;
        padding: 80px;
    }
    .add {
  max-width: 500px;
  margin: 0 auto;
  margin-top: 4rem;
  padding: 20px;
  background-color: #f7f7f7;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
form {
  display: flex;
  flex-direction: column;
}

label {
  font-size: 16px;
  margin-bottom: 5px;
  color: #333;
}

input[type="text"],
input[type="number"],
textarea,
input[type="file"] {
  padding: 10px;
  border-radius: 5px;
  border: none;
  margin-bottom: 15px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  font-size: 16px;
}

input[type="submit"] {
  background-color: #333;
  color: #fff;
  padding: 10px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #555;
}

#error-message {
  color: red;
  font-size: 14px;
  margin-top: 10px;
}

#preview {
  margin-top: 10px;
}

    </style>
</head>

<body>

<?php
include'admin_sidebar.php'; 
?>

  <div class="main-content">
    <div class="add">
    <form action="" method="POST" enctype="multipart/form-data">

        <label for="specialization">Package Category:</label>
            <select id="specialization" name="specialization" style="background-color: #fff;color: black;padding: 10px;border-radius: 5px;border: none;cursor: pointer;font-size: 16px;" required>
                <option value="">Select Package</option>
                <option value="Bridal Make Up">Bridal Package</option>
                <option value="Luxury Hair Treatment">Hair Package</option>
                <option value="Body Polishing">Body Polishing Package</option>
                <option value="Waxing">Waxing Package</option>
                <option value="6 Weeks Course">Tranning Package</option>
            </select><br>

      <label for="doctor_name">Package Name:</label>
      <input type="text" name="doctor_name" id="doctor_name" required><br>

      <label for="doc_price">Package Price:</label>
      <input type="number" name="doc_price" id="doc_price" required><br>

      <label for="doc_desc">Package Description:</label>
      <textarea name="doc_desc" id="doc_desc" required></textarea><br>

      <label for="doc_image">Package Image:</label>
      <input type="file" name="doc_image" id="doc_image" onchange="previewImage(event)"><br>
      <img id="preview" style="display:flex; margin-left:135px ;max-width:200px;max-height:200px;"/><br>

      <input type="submit" value="Submit" name="submit">
    </form>
  </div>
</div>

  <script>
  function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('preview');
      output.style.display = "block";
      output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
  }
  </script>
  <?php
    include'conn.php'; 
      if (isset($_POST['submit'])) {
    $sql = "INSERT INTO `doctors`(`specialization`, `doctor_name`, `doc_price`, `doc_desc`, `doc_image`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to statement
    mysqli_stmt_bind_param($stmt, "sssds", $specialization, $doctor_name, $doc_price, $doc_desc, $doc_image);

      // Set the parameter values from the form data
      $specialization = $_POST["specialization"];
      $doctor_name = $_POST["doctor_name"];
      $doc_price = $_POST["doc_price"];
      $doc_desc = $_POST["doc_desc"];
      $doc_image = "images/" . $_FILES["doc_image"]["name"];

      // Execute the statement
      if (mysqli_stmt_execute($stmt)) {
        echo '<script>alert("New record created successfully");window.location.href = "verify_doctors.php";</script>';
      } else {
        echo "Error: " . mysqli_stmt_error($stmt);
      }

      // Close the statement
      mysqli_stmt_close($stmt);
    }

    // Close the connection
    mysqli_close($conn);

  ?>



</body>

  </html>



