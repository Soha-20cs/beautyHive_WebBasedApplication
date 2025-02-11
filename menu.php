<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    // user is not logged in
} else {
    // user is logged in
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uname = $_POST['useremail'];
    $pass = $_POST['userpass'];

    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "look") or die('Unable to connect');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // Check if user is a patient
        $query = "SELECT * from patients where patient_email ='$uname' and patient_password ='$pass' ";
        $res = mysqli_query($conn, $query);

        if ($res && mysqli_num_rows($res) == 1) {
            echo 'Login Success';
            $row = mysqli_fetch_assoc($res);
            $pid = $row['pid'];
            $patient_name = $row['patient_name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['pid'] = $pid;
            $_SESSION['patient_email'] = $uname;
            $_SESSION['patient_name'] = $patient_name;

            header("Location: patient_login.php");
            exit();
        }

        // Check if user is a doctor
        $query = "SELECT * from doctors where doctor_email ='$uname' and doctor_password ='$pass' and status ='approved'";
        $res = mysqli_query($conn, $query);

        if ($res && mysqli_num_rows($res) == 1) {
            echo 'Login Success';
            $row = mysqli_fetch_assoc($res);
            $doctor_name = $row['doctor_name'];
            $doc_id = $row['doc_id'];

            $_SESSION['loggedin'] = true;
            $_SESSION['doc_id'] = $doc_id;
            $_SESSION['doctor_email'] = $uname;
            $_SESSION['doctor_name'] = $doctor_name;


            header("Location: doctor_login.php");
            exit();
        }

        // Check if user is an admin
        $query = "SELECT * from admin where email ='$uname' and password ='$pass'";
        $res = mysqli_query($conn, $query);

        if ($res && mysqli_num_rows($res) == 1) {
            echo 'Login Success';
            $row = mysqli_fetch_assoc($res);
            $aid = $row['aid'];
            $name = $row['name'];
            $_SESSION['loggedin'] = true;
            $_SESSION['aid'] = $aid;
            $_SESSION['email'] = $uname;
            $_SESSION['name'] = $name;

            header("Location: admin_login.php");
            exit();
        }

        // If none of the above match, login failed
        echo '<script>alert("Login failed");</script>';
        // header("Location: home.php");
        echo '<meta http-equiv="refresh" content="0">';
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="home.css" rel="stylesheet">
</head>

<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">Lavish Look</a>
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

                <?php
         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<li class="nav-item">
          <a class="nav-link" href="appointment.php">Booking</a>
        </li>';
    } else {
        echo '<li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#login" href="#"><span class="glyphicon glyphicon-user"></span> Booking</a>
          </li>';
    }
        ?>


                <?php
         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<li class="nav-item">
          <a class="nav-link" href="medicines.php">Products</a>
        </li>';
    } else {
        echo '<li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#login" href="#"><span class="glyphicon glyphicon-user"></span> Products</a>
          </li>';
    }
        ?>
                <li class="nav-item">
                    <a class="nav-link" href="articles.php">Advisories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <?php
         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>';
    } else {
        echo '<li class="nav-item">
            <a class="nav-link" href="signup.php">Sign Up</a>
          </li>';
    }
        ?>
                <?php
         if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
    } else {
        echo '<li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#login" href="#"><span class="glyphicon glyphicon-user"></span> Login</a>
          </li>';
    }
        ?>
            </ul>
        </div>
    </nav>

    <?php include 'login.php'?>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>