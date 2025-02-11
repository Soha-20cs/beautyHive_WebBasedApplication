  <?php
  session_start(); 
include 'conn.php';

// Validate the input for $doc_id
if (!isset($_SESSION['doc_id'])) {
    echo "Missing required session variable 'doc_id'.";
    exit();
}

$doc_id = mysqli_real_escape_string($conn, $_SESSION['doc_id']);

// Retrieve the total number of patients
$totalAppointmentsQuery = "SELECT COUNT(*) as Overall FROM appointments WHERE doc_id = '$doc_id'";
$totalAppointmentsResult = mysqli_query($conn, $totalAppointmentsQuery);
$totalAppointmentsCount = mysqli_fetch_assoc($totalAppointmentsResult)['Overall'];

$todayAppointmentsQuery = "SELECT COUNT(*) as Overall FROM appointments WHERE appointment_date = CURDATE() AND doc_id = '$doc_id'";
$todayAppointmentsResult = mysqli_query($conn, $todayAppointmentsQuery);
$todayAppointmentsCount = mysqli_fetch_assoc($todayAppointmentsResult)['Overall'];

$UpcomingAppointmentsQuery = "SELECT COUNT(*) as Overall FROM appointments WHERE appointment_date > NOW() AND doc_id = '$doc_id'";
$UpcomingAppointmentsResult = mysqli_query($conn, $UpcomingAppointmentsQuery);
$UpcomingAppointmentsCount = mysqli_fetch_assoc($UpcomingAppointmentsResult)['Overall'];

$PastAppointmentsQuery = "SELECT COUNT(*) as Overall FROM appointments WHERE appointment_date < CURDATE() AND doc_id = '$doc_id'";
$PastAppointmentsResult = mysqli_query($conn, $PastAppointmentsQuery);
$PastAppointmentsCount = mysqli_fetch_assoc($PastAppointmentsResult)['Overall'];
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Doctor Dashboard</title>
      <style>
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
?>

      <div class="main-content">
          <div class="row">
              <div class="col-md-6 col-vlg-3 col-sm-6">
                  <div class="tiles blue m-b-10">
                                          <div class="tiles-body">
                                                  <div class="tiles-title ">Total Appointments</div>
                          <div class="widget-stats">
                              <div class="wrapper transparent">
                                  <span class="item-count animate-number semi-bold"
                          data-animation-duration="700"><?php echo $totalAppointmentsCount;?></span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 col-vlg-3 col-sm-6">
                  <div class="tiles green m-b-10">
                                          <div class="tiles-body">
                        <a href="today_appointments.php" style="color: white;">
                                                    <div class="tiles-title ">Today's Appointments</div>
                          <div class="widget-stats">
                              <div class="wrapper transparent">
                                  <span class="item-count animate-number semi-bold"
                                  data-animation-duration="700"><?php echo $todayAppointmentsCount;?></span>
                              </div>
                          </div>
                        </a>
                      </div>
                  </div>
              </div>
              <div class="col-md-6 col-vlg-3 col-sm-6">
                  <div class="tiles green m-b-10">
                                                                                                    <div class="tiles-body">
                                                              <a href="upcoming_appointments.php" style="color: white;">
                                                    <div class="tiles-title ">Upcoming Appointments</div>
                          <div class="widget-stats">
                              <div class="wrapper transparent">

                                  <span class="item-count animate-number semi-bold"
                                      data-value="<?php echo $UpcomingAppointmentsCount;?>"
                                      data-animation-duration="700"><?php echo $UpcomingAppointmentsCount;?></span>
                              </div>
                          </div>
                          <div class="widget-stats">
                              <div class="wrapper transparent">
                              </div>
                          </div>
                        </a>
                      </div>
                  </div>
              </div>

              <div class="col-md-6 col-vlg-3 col-sm-6">
                  <div class="tiles blue m-b-10">
                     <a href="manage_patients.php" style="color: white;">
                      <div class="tiles-body"><a href="appointment_history.php" style="color: white;">
                          <div class="tiles-title ">Appointment History</div>
                          <div class="widget-stats">
                              <div class="wrapper transparent">
                                  <span class="item-count animate-number semi-bold"
                                      data-animation-duration="700"><?php echo $PastAppointmentsCount;?></span>
                              </div>
                          </div>
                      </div>
                    </a>
                  </div>
              </div>
          </div>
      </div>
      </div>

      <?php include 'footer.php' ?>

  </body>

  </html>