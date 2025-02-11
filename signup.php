<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $patient_name = $_POST['patient_name'];
  $patient_email = $_POST['patient_email'];
  $patient_password = $_POST['patient_password'];

  // Validate input
  $patient_name_errors = validatePatientName($patient_name);
  $patient_email_errors = validateEmail($patient_email);
  $patient_password_errors = validatePassword($patient_password);

  if (empty($patient_name_errors) && empty($patient_email_errors) && empty($patient_password_errors)) {
    // Save patient information to database
    // ...

    // Show alert message and redirect to login page
    echo '<script>alert("Registration completed!");</script>';
    header("Location: patient_login.php");
    exit;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $doctor_name = $_POST['doctor_name'];
  $doctor_email = $_POST['doctor_email'];
  $doctor_password = $_POST['doctor_password'];


  // Validate input
  $doctor_name_errors = validateDoctorName($doctor_name);
  $doctor_email_errors = validateEmail($doctor_email);
  $doctor_password_errors = validatePassword($doctor_password);

  if (empty($doctor_name_errors) && empty($doctor_email_errors) && empty($doctor_password_errors)) {
    // Save doctor information to database
    // ...

    // Show alert message and redirect to login page
    echo '<script>alert("Registration completed!");</script>';
    header("Location: doctor_login.php");
    exit;
  }
}
?>


<!DOCTYPE html>
<html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
    function openForm(formType) {
        closeForms();
        if (formType === "patient") {
            document.querySelector(".patient-form").style.display = "block";
        } else if (formType === "doctor") {
            document.querySelector(".doctor-form").style.display = "block";
        }
        document.querySelector(".form-selector").style.display = "none";
    }

    function closeForms() {
        document.querySelector(".patient-form").style.display = "none";
        document.querySelector(".doctor-form").style.display = "none";
        document.querySelector(".form-selector").style.display = "block";
    }
    </script>
    <style>
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 15px 0;
        box-sizing: border-box;
        border-radius: 46px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
    }

    .container-fluid {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    }

    .form-selector {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px 0;
    }

    .form-container {
        display: none;
        flex-direction: row;
        align-items: center;
        margin: 20px 0
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 250px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    .card button:hover {
        opacity: 0.7;
    }
    </style>
</head>

<body>
    <div class="form-selector">
        <div class="py-5">
            <div class="my-5">
                <div class="text-center">
                    <div class="container-fluid">
                        <h1>Registration</h1><br>
                        <h2>Welcome to Lavish Look</h2>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card">
                            <img class="card-img-top aboutimg" src="images/50.jpg" alt="Card image">
                            <div class="card-body">
                                <button class="btn btn-primary stretched-link"
                                    onclick="openForm('patient')">Register</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="my-5">
        <div class="w-50 m-auto">
            <div class="form-container patient-form">
                <form class="text-center" action="patient_signup.php" method="post">
                    <h2 class="py-5">Registration</h2>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="patient_name" required="" placeholder="Name"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="patient_email" required="" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="patient_password" required="" placeholder="Password"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="mobile" required="" placeholder="Contact Number" class="form-control"
                            pattern="[0-9]{10}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" required="" placeholder="Address" class="form-control">
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </section>
    <section class="my-5">
        <div class="w-50 m-auto">
            <div class="form-container doctor-form">
                <form class="text-center" action="doctor_signup.php" method="post" enctype="multipart/form-data">
                    <h2 class="py-5">Doctor Registration</h2>
                    <div class="form-group">
                        <label>Doctor Name</label>
                        <input type="text" name="doctor_name" required="" placeholder="Doctor Name"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Doctor Email</label>
                        <input type="email" name="doctor_email" required="" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="doctor_password" required="" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Specialization</label>
                        <select name="specialization" class="form-control">
                            <option value="Dentist">Dentist</option>
                            <option value="Cardiologist">Cardiologist</option>
                            <option value="Gynecologist">Gynecologist</option>
                            <option value="Gynecologist">Allergist</option>
                        </select>
                    </div>
                                        <div class="form-group">
                        <label>Your Fee</label>
                        <input type="number" name="doc_price" required="" placeholder="Fee" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Your Description</label>
                    <textarea name="doc_desc" id="doc_desc" required="" placeholder="About Yourself..." class="form-control"></textarea>
                    <div class="form-group">
                        <label>Your Image</label>
                        <input type="file" name="doc_image" required="" style="height: calc(2em + 0.75rem + 2px)!important;" class="form-control" id="doc_image" onchange="previewImage(event)">
      <img id="preview" style="display:flex; margin-left:310px; margin-top: 20px; max-width:200px; max-height:200px;"/>
                    </div>
                </div>
                    <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

</html>